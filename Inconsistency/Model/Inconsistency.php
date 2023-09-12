<?php

namespace Codilar\Inconsistency\Model;

use Magento\Framework\Model\AbstractModel;

class Inconsistency extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Codilar\Inconsistency\Model\ResourceModel\Inconsistency');
    }
}
