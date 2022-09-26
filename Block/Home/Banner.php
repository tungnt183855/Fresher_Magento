<?php

namespace Magenest\Movie\Block\Home;

use \Magento\Framework\View\Element\Template;
use Magenest\Movie\Model\ResourceModel\Banner\CollectionFactory;

class Banner extends Template {

    protected $bannerCollectionFactory;

    public function __construct
    (
        Template\Context $context,
        CollectionFactory $bannerCollectionFactory
    )
    {
        $this->bannerCollectionFactory = $bannerCollectionFactory;
        parent::__construct($context);
    }

    public function getUrlBanner()
    {
        $url = $this->bannerCollectionFactory->create()->getData();
        return $url;
    }

}
