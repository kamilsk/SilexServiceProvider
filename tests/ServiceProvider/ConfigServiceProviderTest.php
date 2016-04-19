<?php

declare(strict_types = 1);

namespace OctoLab\Silex\ServiceProvider;

use OctoLab\Silex\TestCase;
use Silex\Application;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
class ConfigServiceProviderTest extends TestCase
{
    /**
     * @test
     * @dataProvider applicationProvider
     *
     * @data Application $app
     */
    public function register(Application $app)
    {
        $provider = $this->getConfigServiceProvider();
        $app->register($provider);
        $provider->boot($app);
        self::assertTrue($app->offsetExists('config'));
    }
}
