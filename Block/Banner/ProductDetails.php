<?php

namespace Magenest\Movie\Block\Banner;

use Magento\Customer\Model\Context;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Url\DecoderInterface;
use Magento\Framework\Url\EncoderInterface;
use Magento\Framework\View\Element\Template;

class ProductDetails extends \Magento\Framework\View\Element\Template
{
    public function __construct
    (
        Template\Context $context,
        \Magento\Customer\Model\Customer $customer,
        \Magento\Customer\Model\Session $customerSession,
        EncoderInterface $urlEncode,
        DecoderInterface $urlDecode,
        ObjectManagerInterface $objectManager,
        \Magento\Framework\View\Asset\Repository $viewFileUrl,
        \Magento\Customer\Api\GroupRepositoryInterface $groupRepository,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Customer\Model\SessionFactory $customerSessionFactory
    )
    {
        $this->_customerSessionFactory = $customerSessionFactory;
        $this->httpContext = $httpContext;
        $this->groupRepository = $groupRepository;
        $this->objectManager = $objectManager;
        $this->viewFileUrl = $viewFileUrl;
        $this->customer = $customer;
        $this->customerSession = $customerSession;
        $this->urlEncode = $urlEncode;
        $this->urlDecode = $urlDecode;
        parent::__construct($context);
    }

    public function getUrlBanner(){
//        $customerData = $this->customer->load($this->customerSession->getId());
        $customerData = $this->customer->load($this->customerSession->getId());
        if($this->httpContext->getValue(Context::CONTEXT_AUTH)){
            $url = '/S/c/banner.jpg';
            return $this->getUrl('movie/avatar/view/', ['image' => base64_encode($url)]);
        }else{
            return $this->viewFileUrl->getUrl('Magenest_Movie::images/no-profile-photo.jpg');
        }
    }

    public function getGroupB2B(){
        $customerGroupId = $this->_customerSessionFactory->create()->getCustomer()->getGroupId();

        if($this->httpContext->getValue(Context::CONTEXT_AUTH)){
//            $customerGroupId = $this->_customerSessionFactory->create()->getCustomer()->getGroupId();
            $customerGroupId = $this->httpContext->getValue(Context::CONTEXT_GROUP);
        }
//        $group_id=$_SESSION['customer_base']['customer_group_id'];
        $bool = ($this->getGroupName($customerGroupId) == 'b2b') ? true: false;

        return (($this->getGroupName($customerGroupId) == 'b2b') ? true: false);
    }

    public function getGroupName($groupId){
        $group = $this->groupRepository->getById($groupId);
        return $group->getCode();
    }
}
