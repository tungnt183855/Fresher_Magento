<?php
namespace Magenest\Movie\Block\Adminhtml\System\Config\Form\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Button2 extends Field
{
    /**
     * Get the button Run
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $url = "'https://www.google.com'";
        return '<button onclick="window.location.reload()" type="button">' . __('Reload Page') . '</button>';
    }
}
