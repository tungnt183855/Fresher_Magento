<?php

namespace Magenest\Movie\Block\Adminhtml\Form\Field;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Registry;
use Magenest\Movie\Block\Adminhtml\Form\Field\CustomerColumn;

class CustomerGroup extends AbstractFieldArray
{
    private $holidaysRenderer;
    private $dateRenderer;
    /**
     * @var CustomerColumn|\Magento\Framework\View\Element\BlockInterface
     */
    private $customerGroupRenderer;

    public function __construct(
        Context  $context,
        Registry $coreRegistry,
        array    $data = []
    )
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    protected function _prepareToRender()
    {

        $this->addColumn(
            'from_date',
            [
                'label' => __('From'),
                'id' => 'from_date',
                'class' => 'daterecuring',
                'style' => 'width:100px'
            ]
        );

        $this->addColumn(
            'to_date',
            [
                'label' => __('To'),
                'id' => 'to_date',
                'class' => 'daterecuring',
                'style' => 'width:100px'
            ]
        );

        $this->addColumn(
            'date_title',
            [
                'label' => __('Customer Group'),
                'renderer' => $this->getCustomerGroupRenderer()
            ]
        );

        $this->_addAfter = false;
        $this->_addButtonLabel = __('MoreAdd');
    }

    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];
        $row->setData('option_extra_attrs', $options);
    }

    private function getCustomerGroupRenderer()
    {
        if (!$this->customerGroupRenderer) {
            $this->customerGroupRenderer = $this->getLayout()->createBlock(
                CustomerColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->customerGroupRenderer;
    }

    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $html = parent::_getElementHtml($element);

        $script = '<script type="text/javascript">
                require(["jquery", "jquery/ui", "mage/calendar"], function (jq) {
                    jq(function(){
                        function bindDatePicker() {
                            setTimeout(function() {
                                jq(".daterecuring").datepicker( { dateFormat: "mm/dd/yy" } );
                            }, 50);
                        }
                        bindDatePicker();
                        jq("button.action-add").on("click", function(e) {
                            bindDatePicker();
                        });
                    });
                });
            </script>';
        $html .= $script;
        return $html;
    }
}
