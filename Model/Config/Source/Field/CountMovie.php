<?php

namespace Magenest\Movie\Model\Config\Source\Field;

use Magenest\Movie\Model\SubscriptionFactory;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Helper\SecureHtmlRenderer;

class CountMovie extends \Magento\Config\Block\System\Config\Form\Field {

    public function __construct(
        Context $context,
        SubscriptionFactory $movieFactory,
        array $data = [],
        ?SecureHtmlRenderer $secureRenderer = null)
{
    $this->movieFactory = $movieFactory;
    parent::__construct($context, $data, $secureRenderer);
}

    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $movieCount = $this->movieFactory->create()->getCollection()->getSize();
        $element->setValue($movieCount);
        $element->setDisabled('disabled');
        return $element->getElementHtml();
    }
}
