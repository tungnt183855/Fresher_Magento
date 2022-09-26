<?php

namespace Magenest\Movie\Block\Popup;

use Magento\Customer\Model\Context;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Url\DecoderInterface;
use Magento\Framework\Url\EncoderInterface;
use Magento\Framework\View\Element\Template;

class Homepage extends \Magento\Framework\View\Element\Template{
    public function __construct
    (
        Template\Context $context,
        \Magento\Customer\Model\Customer $customer,
        \Magento\Customer\Model\Session $customerSession,
        ObjectManagerInterface $objectManager,
        \Magento\Customer\Api\GroupRepositoryInterface $groupRepository,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Customer\Model\SessionFactory $customerSessionFactory
    )
    {
        $this->_customerSessionFactory = $customerSessionFactory;
        $this->httpContext = $httpContext;
        $this->groupRepository = $groupRepository;
        $this->objectManager = $objectManager;
        $this->customer = $customer;
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    public function getGroupB2B(){
        $customerGroupId = '';
        if($this->httpContext->getValue(Context::CONTEXT_AUTH)){
            $customerGroupId = $this->_customerSessionFactory->create()->getCustomer()->getGroupId();
//            $customerGroupId = $this->httpContext->getValue(Context::CONTEXT_GROUP);
        }
        return (($this->getGroupName($customerGroupId) == 'b2b') ? true: false);
    }

    public function getGroupName($groupId){
        if($this->httpContext->getValue(Context::CONTEXT_AUTH)) {
            $group = $this->groupRepository->getById($groupId);
            return $group->getCode();
        }
        return null;
    }
}
