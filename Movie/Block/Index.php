<?php
//
namespace Magenest\Movie\Block;
use \Magento\Framework\App\Action\Action;

use Magento\Framework\View\Element\Template;

class Index extends Template
{
    protected $directorFactory;
    protected $movieFactory;
    protected $actorFactory;
    protected $movie_actorFactory;

    public function __construct(
        Template\Context $context,
        \Magenest\Movie\Model\DirectorModel\Director\CollectionFactory $directorFactory,
        \Magenest\Movie\Model\ResourceModel\Subscription\CollectionFactory $movieFactory,
        \Magenest\Movie\Model\ActorModel\Actor\CollectionFactory $actorFactory,
        \Magenest\Movie\Model\MovieActorModel\MovieActor\CollectionFactory $movie_actorFactory,
        array $data = []
    )

    {
        parent::__construct($context, $data);
        $this->directorFactory = $directorFactory;
        $this->movieFactory = $movieFactory;
        $this->actorFactory = $actorFactory;
        $this->movie_actorFactory = $movie_actorFactory;
    }

    public function getProducts()
    {
        $collection = $this->directorFactory->create();
        return $collection;
    }

    public function getMovies()
    {
        $collection = $this->movieFactory->create();
        return $collection;
    }

    public function getActors()
    {
        $collection = $this->actorFactory->create();
        return $collection;
    }

    public function getMovieActors()
    {
        $collection = $this->movie_actorFactory->create();
        return $collection;
    }

}
