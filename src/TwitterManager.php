<?php namespace EliuFlorez\Twitter;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use EliuFlorez\Twitter\Factories\TwitterFactory;

class TwitterManager extends AbstractManager
{
    /**
     * @var TwitterFactory
     */
    private $factory;

    /**
     * @param Repository $config
     * @param TwitterFactory $factory
     */
    public function __construct(Repository $config, TwitterFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return mixed
     */
    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'twitter';
    }

    /**
     * Get the factory instance.
     *
     * @return TwitterFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
