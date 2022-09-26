<?php

namespace Magenest\Movie\Model\Attribute\Backend;

use \Magenest\Movie\Model\Source\Validation\Image;

class Avatar extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * @param \Magento\Framework\DataObject $object
     *
     * @return $this
     */
    public function beforeSave($object)
    {
        $validation = new Image();
        $attrCode = $this->getAttribute()->getAttributeCode();
        if ($attrCode == 'avatar') {
            if ($validation->isImageValid('tmpp_name', $attrCode) === false) {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('The profile picture is not a valid image.')
                );
            }
        }

        return parent::beforeSave($object);
    }
}
