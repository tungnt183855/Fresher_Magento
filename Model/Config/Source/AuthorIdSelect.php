<?php

namespace Magenest\Movie\Model\Config\Source;

use Magenest\Movie\Model\BlogFactory;
use Magento\Framework\Option\ArrayInterface;
use Magento\User\Model\ResourceModel\User\CollectionFactory;

class AuthorIdSelect implements ArrayInterface
{

    public function __construct(
        BlogFactory $blogFactory,
        CollectionFactory $userFactory
    ) {
        $this->userFactory = $userFactory;
        $this->blogFactory = $blogFactory;
    }

    public function toOptionArray()
    {
        $userModel = $this->userFactory->create();
        $options[] = ['label' => 'Please select', 'value' => ''];

        if ($userModel->getSize()) {
            foreach ($userModel->getItems() as $user) {
                $options[] = [
                    'label' => $user->getName(),
                    'value' => $user->getUserId()
                ];
            }
        }

        return $options;
    }
}
