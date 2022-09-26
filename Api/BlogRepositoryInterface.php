<?php

namespace Magenest\Movie\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magenest\Movie\Api\Data\BlogInterface;

/**
 * Interface BlogManagementInterface
 * @package Magenest\Movie\Api
 */

interface BlogRepositoryInterface
{
    /**
     * @param int $id
     * @return \Magenest\Movie\Api\Data\BlogInterface
     */
    public function getById($id);

    /**
     * @param \Magenest\Movie\Api\Data\BlogInterface $blog
     * @return \Magenest\Movie\Api\Data\BlogInterface
     */
    public function save(BlogInterface $blog);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById($id);

}
