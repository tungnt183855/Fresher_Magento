<?php
namespace Magenest\Movie\Model\ActorModel;
class Actor extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_actor', 'actor_id');
    }
}

