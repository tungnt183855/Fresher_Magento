<?php
namespace Magenest\Movie\Model\DirectorModel\Director;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'director_id';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Director', 'Magenest\Movie\Model\DirectorModel\Director');
    }
}
