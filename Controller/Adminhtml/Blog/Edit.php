<?php

namespace Magenest\Movie\Controller\Adminhtml\Blog;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;

/**
 * Class AddNew
 * @package ViMagento\HelloWorld\Controller\Adminhtml\Post
 */
class Edit extends Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Edit blog'));

        $urlParams = $this->getRequest()->getParams();

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $blog = $objectManager->create('Magenest\Movie\Model\ResourceModel\Blog\Collection');
        $blogList = $blog->getData('id');
        foreach ($blogList as $bg)
        {
            if($urlParams['id'] == $bg['url_rewrite'])
            {
                $this->_redirect('movie/blog/edit/id/' . $bg['id'] . '/key/'.$urlParams['key']);
            }
        }

        $new = $this->getRequest()->getParams();

        return $resultPage;
    }
}
