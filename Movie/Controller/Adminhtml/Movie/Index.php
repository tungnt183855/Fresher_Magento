<?php
namespace Magenest\Movie\Controller\Adminhtml\Movie;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest::movie');
        $resultPage->addBreadcrumb(__('Movie'), __('Movie'));
        $resultPage->addBreadcrumb(__('Manage Movies'),
            __('Manage Movies'));
        $resultPage->getConfig()->getTitle()->prepend(__('Movies'));
        return $resultPage;
}
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest::movie');
}
}
