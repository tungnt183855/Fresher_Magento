<?php

namespace Magenest\Movie\Controller\Adminhtml\Blog;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Delete extends Action
{
    private $postFactory;
    private $filter;
    private $collectionFactory;
    private $resultRedirect;

    public function __construct(
        Action\Context $context,
        Filter $filter,
        RedirectFactory $redirectFactory,
        \Magenest\Movie\Model\ResourceModel\Blog\CollectionFactory $blogCollection,
        \Magenest\Movie\Model\ResourceModel\Blog $blogFacetory
    )
    {
        parent::__construct($context);
        $this->filter = $filter;
        $this->resultRedirect = $redirectFactory;
        $this->blogCollection = $blogCollection;
        $this->blogFacetory = $blogFacetory;
    }

    public function execute()
    {
        $blogCollection = $this->filter->getCollection($this->blogCollection->create());
        $total = 0;
        $err = 0;
        foreach ($blogCollection as $item) {
            try {
                $item->delete();
                $total++;
            } catch (LocalizedException $exception) {
                $err++;
            }
        }

        if ($total) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $total)
            );
        }

        if ($err) {
            $this->messageManager->addErrorMessage(
                __(
                    'A total of %1 record(s) haven\'t been deleted. Please see server logs for more details.',
                    $err
                )
            );
        }
        return $this->resultRedirect->create()->setPath('movie/blog/index');
    }
}
