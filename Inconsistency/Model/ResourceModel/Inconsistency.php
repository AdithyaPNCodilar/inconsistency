<?php

namespace Codilar\Inconsistency\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Inconsistency extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('inv_custom_data', 'product_id'); // primary key field
    }
}
