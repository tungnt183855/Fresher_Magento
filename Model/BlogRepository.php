<?php

namespace Magenest\Movie\Model;

use Magenest\Movie\Api\Data\BlogInterface;
use Magenest\Movie\Model\ResourceModel\Blog\Collection;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class CustomManagement
 * @package Magenest\Movie\Model
 */
class BlogRepository implements \Magenest\Movie\Api\BlogRepositoryInterface
{
    /**
     * @var \Magenest\Movie\Model\BlogFactory
     */
    protected $blogFactory;

    /**
     * @var ResourceModel\Blog
     */
    protected $blogResource;

    /**
     * @var ResourceModel\Blog\CollectionFactory
     */
    protected $blogCollectionFactory;

    /**
     * CustomRepository constructor.
     * @param \Magenest\Movie\Model\BlogFactory $blogFactory
     * @param ResourceModel\Blog $blogResource
     * @param ResourceModel\Blog\CollectionFactory $blogCollectionFactory
     */
    public function __construct(
        \Magenest\Movie\Model\BlogFactory $blogFactory,
        \Magenest\Movie\Model\ResourceModel\Blog $blogResource,
        \Magenest\Movie\Model\ResourceModel\Blog\CollectionFactory $blogCollectionFactory
    ) {
        $this->blogFactory = $blogFactory;
        $this->blogResource = $blogResource;
        $this->blogCollectionFactory = $blogCollectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($id)
    {
        $blogModel = $this->blogFactory->create();
        $this->blogResource->load($blogModel, $id);
//        var_dump($blogModel->getData());
        if ($blogModel && !$blogModel->getId()) {
            throw new NoSuchEntityException(__('Unable to find custom data with ID "%id"', $id));
        }
        return $blogModel;
    }

    /**
     * {@inheritdoc}
     */
    public function save(BlogInterface $blog)
    {

        $this->blogResource->save($blog);
        return $blog;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($id)
    {
        try {
            $blogModel = $this->blogFactory->create();
            $this->blogResource->load($blogModel, $id);
            $this->blogResource->delete($blogModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;
    }

}
