<?php

namespace OctoLab\Silex\ServiceProvider;

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
        self::assertTrue($app->offsetExists('connections'));
        self::assertTrue($app->offsetExists('connection'));
    }
}
