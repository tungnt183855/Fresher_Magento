<?php

namespace Magenest\Movie\Model\Config\Source\Field;

use Magenest\Movie\Model\ActorFactory;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Helper\SecureHtmlRenderer;

class CountActor extends \Magento\Config\Block\System\Config\Form\Field {

    public function __construct(
        Context $context,
        ActorFactory $actorFactory,
        array $data = [],
        ?SecureHtmlRenderer $secureRenderer = null)
    {
        $this->actorFactory = $actorFactory;
        parent::__construct($context, $data, $secureRenderer);
    }

    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $actorCount = $this->actorFactory->create()->getCollection()->getSize();
        $element->setValue($actorCount);
        $element->setDisabled('disabled');

        $html = $element->getElementHtml();
        $html .= '<script type="text/javascript">
             document.addEventListener("DOMContentLoaded", function() {
                 require(["jquery", "jquery/ui"], function($){
                 //your js code here
                     $(document).ready(function (){
                         $("#movie_moviepage_custom_select_field").on("change", function (){
                             if(this.value == 2) {
                                 $("#row_movie_moviepage_row_magenest_actor").hide();
                             } else {
                                 $("#row_movie_moviepage_row_magenest_actor").show();
                             }
                         })
                     })
             });
        })
        </script>';

        return $html;

//        return $element->getElementHtml();
    }
}
