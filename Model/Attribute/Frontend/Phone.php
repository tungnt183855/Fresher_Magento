<?php

namespace Magenest\Movie\Model\Attribute\Frontend;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Helper\SecureHtmlRenderer;

class Phone extends \Magento\Config\Block\System\Config\Form\Field{
    public function __construct(
        Context $context,
        array $data = [],
        ?SecureHtmlRenderer $secureRenderer = null)
    {
        parent::__construct($context, $data, $secureRenderer);
    }

    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $html = $element->getElementHtml();
        $html .= '<script type="text/javascript">
             require(["jquery", "jquery/ui"], function($){
             //your js code here
                 $(document).ready(function (){
                    $("#' . $element->getHtmlId() . '").keypress(function (){
                        console.log("keypress!!!!!!!!!!!1")
                    })
                 })
        })
        </script>';

        return $html;

    }
}
