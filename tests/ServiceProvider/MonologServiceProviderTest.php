<?php

namespace OctoLab\Silex\ServiceProvider;

use OctoLab\Silex\TestCase;
use Silex\Application;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
class MonologServiceProviderTest extends TestCase
{
    /**
     * @test
     * @dataProvider applicationProvider
     *
     * @param Application $app
     */
    public function register(Application $app)
    {
        $provider = new MonologServiceProvider();
        $app->register($this->getConfigServiceProviderForMonolog());
        $app->register($provider);
        $provider->boot($app);
        self::assertTrue($app->offsetExists('loggers'));
        self::assertTrue($app->offsetExists('logger'));
        self::assertTrue($app->offsetExists('monolog.bridge'));
        self::assertTrue($app->offsetExists('app.name'));
        self::assertContains($app['app.name'], ['test', 'app']);
    }
}
