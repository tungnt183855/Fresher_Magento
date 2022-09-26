<?php

namespace Magenest\Movie\Block\Customer;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Framework\ObjectManagerInterface;

use Magento\Framework\Url\EncoderInterface;
use Magento\Framework\Url\DecoderInterface;

class Account extends \Magento\Framework\View\Element\Template
{
    protected $objectManager;
    protected $viewFileUrl;
    protected $customer;

    public function __construct(
        Context $context,
        ObjectManagerInterface $objectManager,
        \Magento\Framework\View\Asset\Repository $viewFileUrl,
        \Magento\Customer\Model\Customer $customer,
        \Magento\Customer\Model\Session $customerSession,
        EncoderInterface $urlEncode,
        DecoderInterface $urlDecode
    ) {
        $this->objectManager = $objectManager;
        $this->viewFileUrl = $viewFileUrl;
        $this->customer = $customer;
        $this->customerSession = $customerSession;

        $this->urlEncode = $urlEncode;
        $this->urlDecode = $urlDecode;
        parent::__construct($context);
    }

    public function checkImageFile($file)
    {
        $file = base64_decode($file);
        $filesystem = $this->objectManager->get(\Magento\Framework\Filesystem::class);
        $directory = $filesystem->getDirectoryRead(DirectoryList::MEDIA);
        $fileName = CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER . '/' . ltrim($file, '/');
        $path = $directory->getAbsolutePath($fileName);
        if (!$directory->isFile($fileName)
            && !$this->objectManager->get(\Magento\MediaStorage\Helper\File\Storage::class)->processStorageFile($path)
        ) {
            return false;
        }
        return true;
    }

    public function getAvatarCurrentCustomer($file)
    {
        if ($this->checkImageFile(base64_encode($file)) === true) {
            return $this->getUrl('movie/avatar/view/', ['image' => base64_encode($file)]);
        }
        return $this->viewFileUrl->getUrl('Magenest_Movie::images/no-profile-photo.jpg');
    }

    public function getCustomerAvatarById($customer_id = false)
    {
        if ($customer_id) {
            $customerDetail = $this->customer->load($customer_id);
            if ($customerDetail && !empty($customerDetail->getProfilePicture())) {
                if ($this->checkImageFile(base64_encode($customerDetail->getProfilePicture())) === true) {
                    return $this->getUrl(
                        'movie/avatar/view/',
                        ['image' => base64_encode($customerDetail->getProfilePicture())]
                    );
                }
            }
        }
        return $this->viewFileUrl->getUrl('Magenest_Movie::images/no-profile-photo.jpg');
    }

    public function getUrlAvatar(){
        $customerData = $this->customer->load($this->customerSession->getId());
        $url = $customerData->getData('avatar');

        if (!empty($url)) {
            return $this->getUrl('movie/avatar/view/', ['image' => base64_encode($url)]);
        } else{
            return $this->viewFileUrl->getUrl('Magenest_Movie::images/no-profile-photo.jpg');
        }
    }
}
