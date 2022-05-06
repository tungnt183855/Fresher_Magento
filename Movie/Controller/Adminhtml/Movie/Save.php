<?php

namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magenest\Movie\Model\SubscriptionFactory;
use Magento\Backend\App\Action;

class Save extends Action
{

    private $movieFactory;

    public function __construct(
        Action\Context $context,
        SubscriptionFactory $movieFactory
    ) {
        parent::__construct($context);
        $this->movieFactory = $movieFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['movie_id']) ? $data['movie_id'] : null;

        $newData = [
            'name' => $data['name'],
            'description' => $data['description'],
            'rating' => $data['rating'],
            'director_id' => $data['director_id'],
        ];

        $movie = $this->movieFactory->create();

        if ($id) {
            $movie->load($id);
        }
        try {
            $movie->addData($newData);
            $movie->save();
            $this->messageManager->addSuccessMessage(__('You saved the movie.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $this->resultRedirectFactory->create()->setPath('movie/movie/index');
    }
}
