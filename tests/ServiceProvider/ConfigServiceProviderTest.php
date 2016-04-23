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
     * @param Application $app
     */
    public function register(Application $app)
    {
        $expected = [
            'app' => [
                'placeholder_parameter' => 'test',
                'constant' => E_ALL,
            ],
            'component' => [
                'parameter' => 'base component\'s parameter will be overwritten by root config',
                'base_parameter' => 'base parameter will not be overwritten',
            ],
        ];
        $provider = $this->getConfigServiceProvider();
        $app->register($provider);
        $provider->boot($app);
        foreach ($expected as $key => $value) {
            self::assertEquals($value, $app['config'][$key]);
        }
    }
}
