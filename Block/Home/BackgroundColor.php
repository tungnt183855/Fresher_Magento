<?php

namespace Magenest\Movie\Block\Home;

use \Magento\Framework\View\Element\Template;

class BackgroundColor extends Template{
    public function __construct
    (
        Template\Context $context,
        \Magento\Config\Model\ResourceModel\Config\Data\CollectionFactory $collectionConfigData,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Serialize\Serializer\Json $json,
        array $data = []
    )
    {
        $this->json = $json;
        $this->scopeConfig = $scopeConfig;
        $this->collectionConfigData = $collectionConfigData;
        parent::__construct($context, $data);
    }

    public function getConfigData(){
        $resultArr = [];
        $resultArr[] = [
            'color_name' => 'Defaul',
            'color_code' => -1
        ];
        $path = 'magenest/backgroundcolor/colorcode';
        $configValue = $this->scopeConfig->getValue($path);
        $jsonDecode = $this->json->unserialize($configValue);
        $data = $this->collectionConfigData->create();
        foreach ($jsonDecode as $key => $value) {
            $colorName = $value['color_name'];
            $colorCode = $value['color_code'];
            $arr = [
                'color_name' => $value['color_name'],
                'color_code' => $value['color_code']
                ];

            $resultArr[] = $arr;
        }

        return $resultArr;
    }

}
