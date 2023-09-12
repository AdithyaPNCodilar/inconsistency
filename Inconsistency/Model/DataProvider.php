<?php
namespace Codilar\Inconsistency\Model;
use Codilar\Inconsistency\Model\ResourceModel\Inconsistency\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
class DataProvider extends AbstractDataProvider
{
    protected $collection;


    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name,'product_id', $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        return [];
    }
}