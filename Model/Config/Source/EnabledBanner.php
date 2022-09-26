<?php

namespace Magenest\Movie\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class EnabledBanner implements ArrayInterface
{

    public function toOptionArray()
    {
        return [
            [
                'value' => false,
                'label' => __('No')
            ],
            [
                'value' => true,
                'label' => __('Yes')
            ],
        ];
    }
}
