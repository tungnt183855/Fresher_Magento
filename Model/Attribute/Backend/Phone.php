<?php

namespace Magenest\Movie\Model\Attribute\Backend;

use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\Exception\LocalizedException;

class Phone extends AbstractBackend
{
    public function beforeSave($object)
    {
        $obj = $object;
        $phone = $object->getPhone();
        if(substr($phone, 0, 3) == '+84' && strlen($phone) == 12){
            $newPhone = '0' . substr($phone, 3);
            $object->setPhone($newPhone);
            return parent::beforeSave($object);
        }elseif(substr($phone, 0, 1) == '0' && strlen($phone) == 10){
            return parent::beforeSave($object);
        }else{
            throw new LocalizedException(
                __(
                    'Try input phone again. Phone need start with "+84" or "0" with length is 12 or 10',
                )
            );
        }
//
//        return parent::beforeSave($object);
    }
}
