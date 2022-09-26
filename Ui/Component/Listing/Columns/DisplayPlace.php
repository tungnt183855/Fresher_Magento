<?php

namespace Magenest\Movie\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class DisplayPlace extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected $viewFileUrl;
    protected $displayText;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\View\Asset\Repository $viewFileUrl,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
        $this->viewFileUrl = $viewFileUrl;
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $banner = new \Magento\Framework\DataObject($item);

                $value = $banner['place'];
                switch ($value) {
                    case 1:
                        $displayText = 'Top header';
                        break;
                    case 2:
                        $displayText = 'Left sidebar';
                        break;
                    case 3:
                        $displayText = 'Right sidebar';
                        break;
                    default:
                        $displayText = '';
                }
                $item['place'] = $displayText;
            }
        }

        return $dataSource;
    }
}
