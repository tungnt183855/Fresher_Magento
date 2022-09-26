<?php
namespace Magenest\Movie\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magenest\Movie\Api\Data\BlogInterface;

class Blog extends \Magento\Framework\Model\AbstractModel  implements
    IdentityInterface, BlogInterface {

    const CACHE_TAG = 'magenest_log';

    const AUTHOR_ID = 'author_id';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const CONTENT = 'content';
    const URL_REWRITE = 'url_rewrite';
    const STATUS = 'status';
    const CREATE_AT = 'create_at';
    const UPDATE_AT = 'update_at';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\ResourceModel\Blog');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    //<------------------------------------->//

    public function getAuthorId()
    {
        return $this->getData(self::AUTHOR_ID);
    }

    public function setAuthorId($authorId)
    {
        return $this->setData(self::AUTHOR_ID, $authorId);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function getUrlRewrite()
    {
        return $this->getData(self::URL_REWRITE);
    }

    public function setUrlRewrite($urlRewrite)
    {
        return $this->setData(self::URL_REWRITE, $urlRewrite);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATE_AT);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATE_AT, $createdAt);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATE_AT);
    }

    public function setUpdatedAt($updateAt)
    {
        return $this->setData(self::UPDATE_AT, $updateAt);
    }
}
