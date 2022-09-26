<?php

namespace Magenest\Movie\Block\Adminhtml\Dynamic;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magenest\Movie\Block\Adminhtml\Color\Background;

class BackgroundColor extends AbstractFieldArray
{
    private $colorRenderer;

    protected function _prepareToRender()
    {

        $this->addColumn(
            'color_name',
            [
                'label' => __('Color'),
                'id' => 'color_name',
                'class' => '',
                'style' => 'width:100px'
            ]
        );

        $this->addColumn(
            'color_code',
            [
                'label' => __('Color Code'),
                'id' => 'color_code',
                'class' => 'colorcode',
                'style' => 'width:100px',
                'renderer' => $this->getColorRenderer(),
            ]
        );

        $this->_addAfter = false;
        $this->_addButtonLabel = __('MoreAdd');
    }


    private function getColorRenderer()
    {
        if (!$this->colorRenderer) {
            $this->colorRenderer = $this->getLayout()->createBlock(
                Background::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->colorRenderer;
    }


}
