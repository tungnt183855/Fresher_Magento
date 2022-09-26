<?php

namespace Magenest\Movie\Model\Attribute\Source;

class VnRegion extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource{

    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('Northern'), 'value' => 1],
                ['label' => __('Central'), 'value' => 2],
                ['label' => __('South'), 'value' => 3],
            ];
        }
        return $this->_options;
    }
}
