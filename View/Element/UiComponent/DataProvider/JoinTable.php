<?php

namespace Magenest\Movie\View\Element\UiComponent\DataProvider;

use Magenest\Movie\Model\ResourceModel\Blog;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Psr\Log\LoggerInterface as Logger;

class JoinTable extends SearchResult
{
    public function __construct(
        EntityFactory $entityFactory,
        Logger        $logger,
        FetchStrategy $fetchStrategy,
        EventManager  $eventManager,
                      $mainTable = 'magenest_blog',
                      $resourceModel = Blog::class
    )
    {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel);

    }

    protected function _initSelect()
    {
        parent::_initSelect();
        $this->joinTable();

        return $this;
    }

    public function joinTable()
    {
        $blogTable = $this->getTable('magenest_blog');
        $adminUserTable = $this->getTable('admin_user');
        $this->getSelect()
            ->join(
                $adminUserTable,
                 "$adminUserTable.user_id= main_table.author_id"
            );
        return $this;
    }

}
