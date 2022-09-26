<?php

namespace Magenest\Movie\Block\Checkout;

use Magento\Catalog\Model\Product\Configuration\Item\ItemResolverInterface;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Message\InterpretationStrategyInterface;
use Magento\Framework\View\Element\Template;
use Magento\Checkout\Model\Session;

class Cart extends \Magento\Checkout\Block\Cart\Item\Renderer
{
    public function __construct
    (
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Helper\Product\Configuration $productConfig,
        \Magento\Catalog\Block\Product\ImageBuilder $imageBuilder,
        \Magento\Framework\Url\Helper\Data $urlHelper,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        PriceCurrencyInterface $priceCurrency, \Magento\Framework\Module\Manager
        $moduleManager,
        InterpretationStrategyInterface $messageInterpretationStrategy,
        ItemResolverInterface $itemResolver = null,
        Session $session,
        \Magento\Quote\Model\ResourceModel\Quote\Item\Option\Collection $quoteItemOptionCollection,
        \Magento\Checkout\Model\Session\Proxy $checkoutSession,
        \Magento\Framework\Serialize\Serializer\Json $json
    )
    {
        $this->json = $json;
        $this->checkoutSession = $checkoutSession;
        $this->quoteItemOptionCollection = $quoteItemOptionCollection;
        $this->session = $session;
        parent::__construct(
            $context,
            $productConfig,
            $checkoutSession,
            $imageBuilder,
            $urlHelper,
            $messageManager,
            $priceCurrency,
            $moduleManager,
            $messageInterpretationStrategy,
            );
    }

    public function getTimeDelivery(){
        $arrQio = [];
        $checkout = $this->checkoutSession->getQuote()->getAllVisibleItems();
        foreach ($checkout as $qio)
        {
            $id = $qio->getItemId();
            $productId = $qio->getProductId();
            $item = $this->quoteItemOptionCollection->getOptionsByItem($id);
            $arrQio[] = $item[0];
        }
//        $item = $this->quoteItemOptionCollection->get
        return $arrQio;
    }

}
