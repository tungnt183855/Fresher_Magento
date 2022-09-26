<?php

namespace Magenest\Movie\Plugin\Block;

class Cart {
    public function beforeToHtml(\Magento\Checkout\Block\Cart $subject)
    {
        $subject->setTemplate('Magenest_Movie::checkout/cart/cartitems.phtml');
    }
}
