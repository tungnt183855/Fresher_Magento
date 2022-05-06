<?php

namespace Magenest\Movie\Controller\Adminhtml\Director;

use Magenest\Movie\Model\DirectorFactory;
use Magento\Backend\App\Action;

class Save extends Action
{
    private $directorFactory;

    public function __construct(
        Action\Context $context,
        DirectorFactory $directorFactory
    ) {
        parent::__construct($context);
        $this->directorFactory = $directorFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['director_id']) ? $data['director_id'] : null;

        $newData = [
            'name' => $data['name'],
        ];

        $director = $this->directorFactory->create();

        if ($id) {
            $director->load($id);
        }
        try {
            $director->addData($newData);
            $director->save();
            $this->messageManager->addSuccessMessage(__('You saved the director.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $this->resultRedirectFactory->create()->setPath('movie/director/index');
    }
}
