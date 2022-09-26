<?php
namespace Magenest\Movie\Controller\Adminhtml\Sales;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;

class Export extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\Filesystem $filesystem
//        \Magento\Sales\Model\ResourceModel\
    )
    {
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magento_AdminNotification::show_list');
    }
}
