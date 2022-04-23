<?php
namespace Magenest\Movie\Controller\Post;
class Collection extends \Magento\Framework\App\Action\Action {
    public function execute() {
        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->setPageSize(2,1);
        $output = '';
        foreach ($productCollection as $product) {
            $output = var_dump($product->getData());
        }
        $this->getResponse()->setBody($output);
    }
}
