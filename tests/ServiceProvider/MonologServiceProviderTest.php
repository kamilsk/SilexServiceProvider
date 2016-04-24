<?php

declare(strict_types = 1);

namespace OctoLab\Silex\ServiceProvider;

use Monolog\Logger;
use OctoLab\Silex\TestCase;
use Psr\Log\LoggerInterface;
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
        self::assertInstanceOf(LoggerInterface::class, $app['logger']);
        self::assertInstanceOf(Logger::class, $app['loggers']['app']);
        self::assertInstanceOf(Logger::class, $app['loggers']['debug']);
        self::assertInstanceOf(Logger::class, $app['loggers']['db']);
        self::assertEquals($app['logger'], $app['loggers'][$app['config']['monolog:default_channel']]);
        self::assertEquals($app['app.name'], $app['logger']->getName());
        self::assertContains($app['app.name'], ['test', 'app']);
        self::assertTrue($app->offsetExists('monolog.bridge'));
    }
}
