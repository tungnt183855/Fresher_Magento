<?php

namespace Magenest\Movie\Block\Blog;

use Magenest\Movie\Model\ResourceModel\Blog\CollectionFactory;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Template;

class ListBlog extends Template implements IdentityInterface
{

    private CollectionFactory $blogCollectionFactory;

    public function __construct(
        Template\Context  $context,
        CollectionFactory $blogCollectionFactory
    ) {
        $this->blogCollectionFactory = $blogCollectionFactory;
        parent::__construct($context);
    }

    public function getIdentities()
    {
        $identities = [];
        foreach ($this->getBlog()->getItems() as $item) {
            $identities[] = $item->getIdentities();
        }
        $identities = array_merge([], ...$identities);
        return $identities;
    }

    public function getBlog()
    {
        return $this->blogCollectionFactory->create();
    }
}
