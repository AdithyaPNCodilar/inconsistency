<?php

namespace Codilar\Inconsistency\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            $tableName = $setup->getTable('inv_custom_data');
            if (!$setup->getConnection()->isTableExists($tableName)) {
                $viewSql = "CREATE VIEW inv_custom_data AS 
                                SELECT 
                                    cpe.entity_id AS product_id, 
                                    cpe.sku,
                                    csi.qty, 
                                    csi.stock_id
                                FROM 
                                    catalog_product_entity AS cpe
                                INNER JOIN 
                                    cataloginventory_stock_item AS csi 
                                ON 
                                    cpe.entity_id = csi.product_id
                                WHERE 
                                    cpe.sku IN (SELECT DISTINCT sku FROM inventory_reservation)";
                $setup->getConnection()->query($viewSql);    
                // custom id column with primary key and auto increment
                $setup->getConnection()->query(
                    "ALTER TABLE inv_custom_data
                    ADD COLUMN id INT NOT NULL AUTO_INCREMENT,
                    ADD PRIMARY KEY (id);"
                );
            }
        }
        $setup->endSetup();
    }    
}
