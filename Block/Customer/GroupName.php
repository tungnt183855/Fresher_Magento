<?php

namespace Magenest\Movie\Block\Customer;

use Magento\Customer\Model\Context;
use Magento\Framework\View\Element\Template;

class GroupName extends \Magento\Framework\View\Element\Template
{
    public function __construct
    (
        Template\Context $context,
        \Magento\Customer\Api\GroupRepositoryInterface $groupRepository,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Customer\Model\SessionFactory $customerSessionFactory
    )
    {
        $this->_customerSessionFactory = $customerSessionFactory;
        $this->httpContext = $httpContext;
        $this->groupRepository = $groupRepository;
        parent::__construct($context);
    }

    public function getGroupId(){
        if($this->httpContext->getValue(Context::CONTEXT_AUTH)){
            $groupId = $this->_customerSessionFactory->create()->getCustomerGroupId();
            return $groupId;
        }
        return null;
    }

    public function getGroupName(){
        $groupId = $this->getGroupId();
        $group = $this->groupRepository->getById($groupId);
        return $group->getCode();
    }

}
