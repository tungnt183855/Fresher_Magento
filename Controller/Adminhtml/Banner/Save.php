<?php

namespace Magenest\Movie\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magenest\Movie\Model\BannerFactory;

class Save extends \Magento\Backend\App\Action
{
    public function __construct
    (
        Context $context,
        BannerFactory $bannerFactory,
        \Magenest\Movie\Model\ResourceModel\Banner\CollectionFactory $bannerCollection
    )
    {
        $this->bannerCollection = $bannerCollection;
        $this->bannerFacetory = $bannerFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $id = !empty($data['id']) ? $data['id'] : null;

        $urlRemove = 'http://magento243.local/media/label/icon/Screenshot_from_2022-06-05_22-54-00_3.png';
        $banner = $this->bannerFacetory->create();
        $newData = [
            'name' => $data['name'],
            'enabled' => $data['enabled'],
            'title' => $data['title'],
            'image' => $data['image'][0]['url'],
            'link' => $data['link'],
            'text' => $data['text'],
            'place' => $data['place'],
        ];

        if($id){
            $banner->load($id);
        }

        try {
            $banner->addData($newData);
            $banner->save();
            $this->messageManager->addSuccessMessage(__('You saved the banner.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $this->resultRedirectFactory->create()->setPath('movie/banner/index');

    }
}
