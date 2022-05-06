<?php

namespace Magenest\Movie\Model\Config\Source;

class Custom implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => null,
                'label' => __('--Please Select--')
            ],
            [
                'value' => '1',
                'label' => __('Show')
            ],
            [
                'value' => '2',
                'label' => __('not-show')
            ],
        ];
    }
}
