<?php

namespace Magenest\Movie\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface BlogInterface
 * @package Magenest\Movie\Api\Data
 */
interface BlogInterface extends ExtensibleDataInterface
{
//    public function getId();
//    public function setId($id);
    /**
     * @return int
     */
    public function getAuthorId();
    /**
     * @param int $authorId
     * @return $this
     */
    public function setAuthorId($authorId);

    /**
     * @return string
     */
    public function getTitle();
    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getDescription();
    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getContent();
    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content);

    /**
     * @return string
     */
    public function getUrlRewrite();
    /**
     * @param string $urlRewrite
     * @return $this
     */
    public function setUrlRewrite($urlRewrite);

    /**
     * @return string
     */
    public function getStatus();
    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * @return string
     */
    public function getCreatedAt();
    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * @return string
     */
    public function getUpdatedAt();
    /**
     * @param string $updateAt
     * @return $this
     */
    public function setUpdatedAt($updateAt);
}
