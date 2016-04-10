<?php

namespace OctoLab\Silex;

use Silex\ServiceProviderInterface;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
class Application extends \Silex\Application
{
    /** @var array<string,bool> */
    private $registry = [];

    /**
     * @param string $name
     * @param array $values
     *
     * @api
     */
    public function __construct($name, array $values = [])
    {
        parent::__construct($values);
        $this['app.name'] = $name;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     */
    public function register(ServiceProviderInterface $provider, array $values = [])
    {
        $key = get_class($provider);
        if (!isset($this->registry[$key])) {
            parent::register($provider, $values);
            $this->registry[$key] = true;
        }
    }
}
