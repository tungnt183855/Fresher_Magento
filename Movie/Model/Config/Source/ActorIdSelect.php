<?php

namespace Magenest\Movie\Model\Config\Source;

use Magenest\Movie\Model\ActorFactory;
use Magento\Framework\Option\ArrayInterface;

class ActorIdSelect implements ArrayInterface
{
    private $movieFactory;

    public function __construct(
        ActorFactory $actorFactory
    ) {
        $this->actorFactory = $actorFactory;
    }

    public function toOptionArray()
    {
        $actorModel = $this->actorFactory->create()->getCollection();
        $options[] = ['label' => 'Please select', 'value' => ''];

        if ($actorModel->getSize()) {
            foreach ($actorModel->getItems() as $actor) {
                $options[] = [
                    'label' => $actor->getName(),
                    'value' => $actor->getActorId()
                ];
            }
        }

        return $options;
    }
}
