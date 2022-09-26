<?php

namespace Magenest\Movie\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class DisplayPlace implements ArrayInterface
{

    public function toOptionArray()
    {
        return [
            [
                'value' => null,
                'label' => __('Please Select...')
            ],
            [
                'value' => 1,
                'label' => __('Top header')
            ],
            [
                'value' => 2,
                'label' => __('Left sidebar')
            ],
            [
                'value' => 3,
                'label' => __('Rigt sidebar')
            ],
        ];
    }
}
