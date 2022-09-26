<?php

namespace Magenest\Movie\Controller\Adminhtml\Blog;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magenest\Movie\Model\BlogFactory;

class Save extends \Magento\Backend\App\Action
{
    public function __construct
    (
        Context $context,
        BlogFactory $blogFactory,
        \Magenest\Movie\Model\ResourceModel\Blog\CollectionFactory $blogCollection
    )
    {
        $this->blogCollection = $blogCollection;
        $this->blogFacetory = $blogFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $id = !empty($data['id']) ? $data['id'] : null;

        $blog = $this->blogFacetory->create();
        $newData = [
            'author_id' => $data['author_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'url_rewrite' => $data['url_rewrite'],
            'status' => $data['status'],
            'create_at' => $data['create_at'],
            'update_at' => $data['update_at'],
        ];

        if($id){
            $blog->load($id);
        }

        $blogModel = $this->blogCollection->create();
        $checkUrlRewrite = false;
        foreach ($blogModel as $blog1){
            $i = $id;
            if($id == $blog1['id']){
                continue;
            }

            if($blog1['url_rewrite'] == $data['url_rewrite']){
                $checkUrlRewrite = true;
                break;
            }
        }

        if(!$checkUrlRewrite){
            try {
                $blog->addData($newData);
                $blog->save();
                $this->messageManager->addSuccessMessage(__('You saved the blog.'));
            }catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__($e->getMessage()));
            }

            return $this->resultRedirectFactory->create()->setPath('movie/blog/index');
        }else{

            $this->messageManager->addErrorMessage(__('Blog not save. error : url_rewrite '));
            return $this->resultRedirectFactory->create()->setPath('movie/blog/index');
        }

    }
}
