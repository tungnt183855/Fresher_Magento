<?php
namespace Magenest\Movie\Model\MovieActorModel;
class MovieActor extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_movie_actor', 'movie_actor_id');
    }
}

