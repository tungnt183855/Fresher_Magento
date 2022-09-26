<?php
namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magenest\Movie\Helper\Email;


class CustomerPlaceOrder implements ObserverInterface
{
    private $helperEmail;

    public function __construct(
        Email $helperEmail
    ) {
        $this->helperEmail = $helperEmail;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $data = $observer->getData('order');
        $increment_id = $data->getIncrementID();
        return $this->helperEmail->sendEmail($increment_id);
    }
}
