<?php
//
//namespace Magenest\Movie\Controller\Post;
//
//class Index extends \Magento\Framework\App\Action\Action
//{
//    protected $subscriptionFactory;
//    protected $directorFactory;
//
//    public function __construct(
//        \Magento\Framework\App\Action\Context $context,
//        \Magenest\Movie\Model\SubscriptionFactory $subscriptionFactory,
//        \Magenest\Movie\Model\DirectorFactory $directorFactory
//    )
//    {
//        $this->subscriptionFactory = $subscriptionFactory;
//        $this->directorFactory = $directorFactory;
//        return parent::__construct($context);
//    }
//
//    public function execute()
//    {
//        $data = $this->subscriptionFactory->create()->getCollection();
//        $data_director = $this->directorFactory->create()->getCollection();
//
//
//        echo "<h2>List table movie, director, actor, movie_actor</h2>";
//
//        echo "<h4>Movie</h4></br>";
//        foreach ($data as $value) {
//            print_r($value->getData());
//            echo "</br>";
//        }
//
//        echo "<h4>Director</h4></br>";
//        foreach ($data_director as $value) {
//            print_r($value->getData());
//            echo "</br>";
//        }
//    }
//}


namespace Magenest\Movie\Controller\Post;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;

class Index extends Action
{
    /**
     * Index action
     *
     * @return $this
     */

    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context      $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}

