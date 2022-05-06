<?php

namespace Magenest\Movie\Controller\Adminhtml\MovieActor;

use Magenest\Movie\Model\MovieActorFactory;
use Magento\Backend\App\Action;

class Save extends Action
{
    private $movieactorFactory;

    public function __construct(
        Action\Context $context,
        MovieActorFactory $movieactorFactory
    ) {
        parent::__construct($context);
        $this->movieactorFactory = $movieactorFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['movie_actor_id']) ? $data['movie_actor_id'] : null;

        $newData = [
            'movie_id' => $data['movie_id'],
            'actor_id' => $data['actor_id'],
        ];

        $movieactor = $this->movieactorFactory->create();

        if ($id) {
            $movieactor->load($id);
        }
        try {
            $movieactor->addData($newData);
            $movieactor->save();
            $this->messageManager->addSuccessMessage(__('You saved the movie actor.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $this->resultRedirectFactory->create()->setPath('movie/movieactor/index');
    }
}
