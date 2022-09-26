<?php

namespace Magenest\Movie\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;


class AddProductAttribute implements DataPatchInterface
{
    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * EavSetupFactory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * AddProductAttribute constructor.
     *
     * @param ModuleDataSetupInterface  $moduleDataSetup
     * @param EavSetupFactory           $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'course_start', [
            'type' => 'datetime',
            'label' => 'Magenest Course Start',
            'input' => 'date',
            'backend' => '',
            'frontend' => '',
            'class' => '',
            'default' => '',
            'searchable' => true,
            'filterable' => true,
            'comparable' => true,
            'visible_on_front' => false,
            'unique' => false,
            'source' => '',
            'is_used_in_grid' => true,
            'is_visible_in_grid' => true,
            'is_filterable_in_grid' => true,
            'apply_to' => 'simple,configurable,virtual,bundle,downloadable',
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'visible' => false,
            'used_in_product_listing' => true,
            'user_defined' => true,
            'required' => false,
            'group' => 'General',
            'sort_order' => 1,
        ]);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'course_end', [
            'type' => 'datetime',
            'label' => 'Magenest Course End',
            'input' => 'date',
            'backend' => '',
            'frontend' => '',
            'class' => '',
            'default' => '',
            'searchable' => true,
            'filterable' => true,
            'comparable' => true,
            'visible_on_front' => false,
            'unique' => false,
            'source' => '',
            'is_used_in_grid' => true,
            'is_visible_in_grid' => true,
            'is_filterable_in_grid' => true,
            'apply_to' => 'simple,configurable,virtual,bundle,downloadable',
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'visible' => true,
            'used_in_product_listing' => true,
            'user_defined' => true,
            'required' => false,
            'group' => 'General',
            'sort_order' => 2,
        ]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'product_image',
            [
                'type' => 'varchar',
                'label' => 'Product Image',
                'input' => 'image',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'sort_order' => 2,
                'position' => 2,
                'system' => 0,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true,
                'group' => 'General Information'
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'description_course',
            [
                'type' => 'text',
                'label' => 'Desciption Magenest',
                'input' => 'text',
                'source' => '',
                'required' => false,
                'visible' => true,
                'position' => 3,
                'system' => false,
                'backend' => '',
                'group' => 'General Information'
            ]
        );


    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    public static function getVersion()
    {
        return '1.0.1';
    }
}
