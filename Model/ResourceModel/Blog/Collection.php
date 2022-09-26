<?php
namespace Magenest\Movie\Model\ResourceModel\Blog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Blog', 'Magenest\Movie\Model\ResourceModel\Blog');
    }

//    protected function _initSelect()
//    {
//        parent::_initSelect();
//        $this->joinTable();
//
//        return $this;
//    }
//
//    public function joinTable(){
//        $blogTable = $this->getTable('magenest_blog');
//        $admin_userTable = $this->getTable('admin_user');
//        $result = $this
//            ->join($blogTable, 'main_table.id='.$blogTable.'.id',null)
//            ->join($admin_userTable,$admin_userTable.'.user_id='.$blogTable.'.author_id',null);
//        return $result->getSelect();
//    }
}
