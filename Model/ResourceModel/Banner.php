<?php
namespace Magenest\Movie\Model\ResourceModel;
class Banner extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_banner', 'id');
    }
}

