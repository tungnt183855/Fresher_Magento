<?php

namespace Magenest\Movie\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Upload extends \Magento\Backend\App\Action{
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magenest\Movie\Model\ImageUploader $imageUploader
    ){
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    public function execute()
    {
        $imageId = $this->_request->getParam('param_name');
        $files = $this->getRequest()->getFiles()['assign_applicants']['dynamic_row'][0]['product_image'];
//        var_dump($files);die;
        try {
            $result = $this->imageUploader->saveFileToTmpDir($files);
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
