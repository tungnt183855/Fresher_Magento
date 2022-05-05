<?php

namespace Magenest\Movie\Controller\Adminhtml\Actor;

use Magenest\Movie\Model\ActorFactory;
use Magento\Backend\App\Action;

class Save extends Action
{
    private $directorFactory;

    public function __construct(
        Action\Context $context,
        ActorFactory $actorFactory
    ) {
        parent::__construct($context);
        $this->actorFactory = $actorFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['actor_id']) ? $data['actor_id'] : null;

        $newData = [
            'name' => $data['name'],
        ];

        $actor = $this->actorFactory->create();

        if ($id) {
            $actor->load($id);
        }
        try {
            $actor->addData($newData);
            $actor->save();
            $this->messageManager->addSuccessMessage(__('You saved the actor.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $this->resultRedirectFactory->create()->setPath('movie/actor/index');
    }
}
