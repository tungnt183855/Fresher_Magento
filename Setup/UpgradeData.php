<?php
namespace Magenest\Movie\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeData implements \Magento\Framework\Setup\UpgradeDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

//    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
//    {
//        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
//        $eavSetup->addAttribute(
//            \Magento\Catalog\Model\Product::ENTITY,
//            'enable_start',
//            [
//                'type' => 'datetime',
//                'backend' => '',
//                'frontend' => '',
//                'label' => 'Enable Start',
//                'input' => 'date',
//                'class' => '',
//                'group' => 'Enable Product Date Range',
//                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
//                'visible' => true,
//                'required' => false,
//                'user_defined' => true,
//                'default' => '',
//                'searchable' => true,
//                'filterable' => true,
//                'comparable' => true,
//                'visible_on_front' => false,
//                'used_in_product_listing' => false,
//                'unique' => false,
//                'sort_order' => '70',
//                'source' => '',
//                'is_used_in_grid' => true,
//                'is_visible_in_grid' => true,
//                'is_filterable_in_grid' => true,
//                'apply_to' => 'simple,configurable,virtual,bundle,downloadable',
//            ]
//        );
//
//        $eavSetup->addAttribute(
//            \Magento\Catalog\Model\Product::ENTITY,
//            'enable_end',
//            [
//                'type' => 'datetime',
//                'backend' => '',
//                'frontend' => '',
//                'label' => 'Enable End',
//                'input' => 'date',
//                'class' => '',
//                'group' => 'Enable Product Date Range',
//                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
//                'visible' => true,
//                'required' => false,
//                'user_defined' => true,
//                'default' => '',
//                'searchable' => true,
//                'filterable' => true,
//                'comparable' => true,
//                'visible_on_front' => false,
//                'used_in_product_listing' => false,
//                'unique' => false,
//                'source' => '',
//                'sort_order' => '80',
//                'is_used_in_grid' => true,
//                'is_visible_in_grid' => true,
//                'is_filterable_in_grid' => true,
//                'apply_to' => 'simple,configurable,virtual,bundle,downloadable',
//            ]
//        );
//    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement upgrade() method.
//        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
//        $eavSetup->addAttribute(
//            \Magento\Catalog\Model\Product::ENTITY,
//            'enable_start',
//            [
//                'type' => 'datetime',
//                'backend' => '',
//                'frontend' => '',
//                'label' => 'Enable Start',
//                'input' => 'date',
//                'class' => '',
//                'group' => 'Enable Product Date Range',
//                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
//                'visible' => true,
//                'required' => false,
//                'user_defined' => true,
//                'default' => '',
//                'searchable' => true,
//                'filterable' => true,
//                'comparable' => true,
//                'visible_on_front' => false,
//                'used_in_product_listing' => false,
//                'unique' => false,
//                'sort_order' => '70',
//                'source' => '',
//                'is_used_in_grid' => true,
//                'is_visible_in_grid' => true,
//                'is_filterable_in_grid' => true,
//                'apply_to' => 'simple,configurable,virtual,bundle,downloadable',
//            ]
//        );
//

//        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
//
//        $eavSetup->removeAttribute(\Magento\Catalog\Model\Product::ENTITY, 'course_start_datetime');
//        $eavSetup->addAttribute(
//            \Magento\Catalog\Model\Product::ENTITY,
//            'course_start',
//            [
//                'group' => 'General',
//                'label' => 'Enable Start Date',
//                'type' => 'datetime',
//                'input' => 'date',
//                'input_renderer' => 'Velanapps\Test\Block\Adminhtml\Form\Element\Datetime',
//                'class' => 'validate-date',
//                'backend' => 'Magento\Catalog\Model\Attribute\Backend\Startdate',
//                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
//                'visible' => true,
//                'required' => false,
//                'user_defined' => true,
//                'default' => '',
//                'searchable' => true,
//                'filterable' => true,
//                'filterable_in_search' => true,
//                'visible_in_advanced_search' => true,
//                'comparable' => false,
//                'visible_on_front' => false,
//                'used_in_product_listing' => true,
//                'unique' => false
//            ]
//        );
//
//                $eavSetup->addAttribute(
//            \Magento\Catalog\Model\Product::ENTITY,
//            'course_end',
//            [
//                'group' => 'General',
//                'type' => 'datetime',
//                'backend' => '',
//                'frontend' => '',
//                'label' => 'Enable End',
//                'input' => 'date',
//                'class' => '',
//                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
//                'visible' => true,
//                'required' => false,
//                'user_defined' => true,
//                'default' => '',
//                'searchable' => true,
//                'filterable' => true,
//                'comparable' => true,
//                'visible_on_front' => false,
//                'used_in_product_listing' => false,
//                'unique' => false,
//                'source' => '',
//                'sort_order' => '80',
//                'is_used_in_grid' => true,
//                'is_visible_in_grid' => true,
//                'is_filterable_in_grid' => true,
//                'apply_to' => 'simple,configurable,virtual,bundle,downloadable',
//            ]
//        );
    }
}
