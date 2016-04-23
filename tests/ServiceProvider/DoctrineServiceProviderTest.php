<?php

declare(strict_types = 1);

namespace OctoLab\Silex\ServiceProvider;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\Type;
use OctoLab\Silex\TestCase;
use Silex\Application;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
class DoctrineServiceProviderTest extends TestCase
{
    /**
     * @test
     * @dataProvider applicationProvider
     *
     * @param Application $app
     */
    public function register(Application $app)
    {
        $provider = new DoctrineServiceProvider();
        $app->register($this->getConfigServiceProviderForDoctrine());
        $app->register($provider);
        $provider->boot($app);
        self::assertInstanceOf(Connection::class, $app['connection']);
        self::assertInstanceOf(Connection::class, $app['connections']['mysql']);
        self::assertInstanceOf(Connection::class, $app['connections']['sqlite']);
        self::assertEquals($app['connection'], $app['connections'][$app['config']['doctrine:dbal:default_connection']]);
        foreach ($app['config']['doctrine:dbal:types'] as $type => $_) {
            self::assertTrue(Type::hasType($type));
        }
    }
}
