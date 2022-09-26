<?php

namespace Magenest\Movie\Block\Checkout;

class LayoutProcessorPlugin
{
    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, $result){
        $customAttributeCode = 'vn_region';
        $customField = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                // customScope is used to group elements within a single form (e.g. they can be validated separately)
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
            ],
            'dataScope' => 'shippingAddress.custom_attributes' . '.' . $customAttributeCode,
            'label' => 'Custom Attribute Magenest',
            'provider' => 'checkoutProvider',
            'sortOrder' => 0,
            'validation' => [
                'required-entry' => true
            ],
            'options' => [
                [
                    'value' => 1,
                    'label' => __("Northern"),
                ],
                [
                    'value' => 2,
                    'label' => __("Central"),
                ],
                [
                    'value' => 3,
                    'label' => __("South"),
                ],
            ],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
            'value' => '' // value field is used to set a default value of the attribute
        ];

        $result['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children'][$customAttributeCode] = $customField;

        return $result;
    }
}
