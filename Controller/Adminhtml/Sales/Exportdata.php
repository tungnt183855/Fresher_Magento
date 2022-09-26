<?php

namespace Magenest\Movie\Controller\Adminhtml\Sales;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\ResponseInterface;

class Exportdata extends \Magento\Backend\App\Action
{
    protected $uploaderFactory;

    protected $_locationFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $locationFactory, // This is returns Collaction of Data
        \Magento\Sales\Model\Order\ItemFactory $itemFactory
    )
    {
        parent::__construct($context);
        $this->itemFactory =$itemFactory;
        $this->_fileFactory = $fileFactory;
        $this->_locationFactory = $locationFactory;
        $this->directory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR); // VAR Directory Path
        parent::__construct($context);
    }

    public function execute()
{
    $name = date('m-d-Y-H-i-s');
    $filepath = 'export/export-data-' .$name. '.csv'; // at Directory path Create a Folder Export and FIle
    $this->directory->create('export');

    $stream = $this->directory->openFile($filepath, 'w+');
    $stream->lock();

    //column name dispay in your CSV

    $columns = [
        'entity_id',
        'state',
        'status',
        'coupon_code',
        'protect_code',
        'shipping_description',
        'store_id',
        'customer_id',
        'customer_firstname',
        'customer_lastname',
        'product_options'
        ];

    foreach ($columns as $column)
    {
        $header[] = $column; //storecolumn in Header array
    }

    $stream->writeCsv($header);

    $location = $this->_locationFactory->create()->addAttributeToSelect('*');
    $itemCollection = $this->itemFactory->create()->getCollection();

    foreach($location->getData('protect_code') as $sales_order){

        // column name must same as in your Database Table

        $itemData = [];

        $itemData[] = $sales_order['entity_id'];
        $itemData[] = $sales_order['state'];
        $itemData[] = $sales_order['status'];
        $itemData[] = $sales_order['coupon_code'];
        $itemData[] = $sales_order['protect_code'];
        $itemData[] = $sales_order['shipping_description'];
        $itemData[] = $sales_order['store_id'];
        $itemData[] = $sales_order['customer_id'];
        $itemData[] = $sales_order['customer_firstname'];
        $itemData[] = $sales_order['customer_lastname'];

        foreach ($itemCollection->getData('product_options') as $sale_order_item)
        {
            if($sale_order_item['item_id'] == $sales_order['entity_id'])
            {
                $itemData[] = $sale_order_item['product_options'];
            }
        }

        $stream->writeCsv($itemData);

    }

    $content = [];
    $content['type'] = 'filename'; // must keep filename
    $content['value'] = $filepath;
    $content['rm'] = '1'; //remove csv from var folder

    $csvfilename = 'sales-order-product'.$name.'.csv';
    return $this->_fileFactory->create($csvfilename, $content, DirectoryList::VAR_DIR);

}


}
