<?php
namespace Magenest\Movie\Model\ResourceModel\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Banner', 'Magenest\Movie\Model\ResourceModel\Banner');
    }

}
