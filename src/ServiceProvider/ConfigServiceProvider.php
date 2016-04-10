<?php

namespace OctoLab\Silex\ServiceProvider;

use OctoLab\Kilex\ServiceProvider\ConfigServiceProvider as KilexConfigServiceProvider;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
class ConfigServiceProvider extends KilexConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }

    /**
     * @param Application $app
     *
     * @throws \InvalidArgumentException
     * @throws \Exception
     * @throws \Symfony\Component\Config\Exception\FileLoaderLoadException
     * @throws \Symfony\Component\Config\Exception\FileLoaderImportCircularReferenceException
     * @throws \DomainException
     * @throws \LogicException
     *
     * @api
     */
    public function register(Application $app)
    {
        $this->setup($app);
    }
}
