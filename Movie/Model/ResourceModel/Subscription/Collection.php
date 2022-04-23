<?php
namespace Magenest\Movie\Model\ResourceModel\Subscription;
/**
 * Subscription Collection
 */
//class Collection extends
//    \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
//{
//    public function _construct() {
//        $this->_init('Magenest\Movie\Model\Subscription',
//            'Magenest\Movie\Model\ResourceModel\Subscription');
//    }
//}

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'movie_id';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Subscription', 'Magenest\Movie\Model\ResourceModel\Subscription');
    }
}
