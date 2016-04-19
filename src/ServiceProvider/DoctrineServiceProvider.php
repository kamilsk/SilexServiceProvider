<?php

declare(strict_types = 1);

namespace OctoLab\Silex\ServiceProvider;

use OctoLab\Kilex\ServiceProvider\DoctrineServiceProvider as KilexDoctrineServiceProvider;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
class DoctrineServiceProvider extends KilexDoctrineServiceProvider implements ServiceProviderInterface
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
     * @throws \Doctrine\DBAL\DBALException
     *
     * @api
     */
    public function register(Application $app)
    {
        $this->setup($app);
    }
}
