<?php

namespace Magenest\Movie\Model\Config\Source;

use Magenest\Movie\Model\SubscriptionFactory;
use Magento\Framework\Option\ArrayInterface;

class MovieIdSelect implements ArrayInterface
{
    private $movieFactory;

    public function __construct(
        SubscriptionFactory $movieFactory
    ) {
        $this->movieFactory = $movieFactory;
    }

    public function toOptionArray()
    {
        $movieModel = $this->movieFactory->create()->getCollection();
        $options[] = ['label' => 'Please select', 'value' => ''];

        if ($movieModel->getSize()) {
            foreach ($movieModel->getItems() as $movie) {
                $options[] = [
                    'label' => $movie->getName(),
                    'value' => $movie->getMovieId()
                ];
            }
        }

        return $options;
    }
}
