<?php

namespace Codilar\Inconsistency\Model\ResourceModel\Inconsistency;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codilar\Inconsistency\Model\Inconsistency as InconsistencyModel;
use Codilar\Inconsistency\Model\ResourceModel\Inconsistency as InconsistencyResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'product_id'; // primary key field

    protected function _construct()
    {
        $this->_init(InconsistencyModel::class, InconsistencyResourceModel::class);
    }
}
