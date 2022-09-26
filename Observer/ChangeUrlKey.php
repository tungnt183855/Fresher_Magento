<?php
namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ChangeUrlKey implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(Observer $observer)
    {
        // TODO: Implement execute() method.
        $data = $observer->getData('urlParams');

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $blog = $objectManager->create('Magenest\Movie\Model\ResourceModel\Blog\Collection');
        $blogList = $blog->getData('id');
        foreach ($blogList as $bg)
        {
            if($data['id'] == $bg['url_rewrite'])
            {
                $data['id'] = $bg['id'];
                break;
            }
        }
        return $data;
    }
}
