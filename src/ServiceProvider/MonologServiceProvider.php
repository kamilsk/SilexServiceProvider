<?php

namespace OctoLab\Silex\ServiceProvider;

use OctoLab\Kilex\ServiceProvider\MonologServiceProvider as KilexMonologServiceProvider;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
class MonologServiceProvider extends KilexMonologServiceProvider implements ServiceProviderInterface
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
     *
     * @api
     */
    public function register(Application $app)
    {
        $this->setup($app);
        if (!$app->offsetExists('app.name')) {
            $app['app.name'] = 'app';
        }
    }
}
