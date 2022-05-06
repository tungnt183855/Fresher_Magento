<?php

namespace Magenest\Movie\Model\Config\Source;

use Magenest\Movie\Model\DirectorFactory;
use Magento\Framework\Option\ArrayInterface;

class DirectorIdSelect implements ArrayInterface
{
    private $directorFactory;

    public function __construct(
        DirectorFactory $directorFactory
    ) {
        $this->directorFactory = $directorFactory;
    }

    public function toOptionArray()
    {
        $directorModel = $this->directorFactory->create()->getCollection();
        $options[] = ['label' => 'Please select', 'value' => ''];

        if ($directorModel->getSize()) {
            foreach ($directorModel->getItems() as $director) {
                $options[] = [
                    'label' => $director->getName(),
                    'value' => $director->getDirectorId()
                ];
            }
        }

        return $options;
    }
}
