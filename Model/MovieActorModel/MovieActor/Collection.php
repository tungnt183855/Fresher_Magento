<?php
namespace Magenest\Movie\Model\MovieActorModel\MovieActor;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'movie_actor_id';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\MovieActor', 'Magenest\Movie\Model\MovieActorModel\MovieActor');
    }
}
