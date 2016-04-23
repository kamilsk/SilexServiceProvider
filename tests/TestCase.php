<?php

declare(strict_types = 1);

namespace OctoLab\Silex;

use Silex\Application as SilexApplication;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function applicationProvider(): array
    {
        return [
            [new SilexApplication()],
            [new Application('test')],
        ];
    }

    /**
     * @param string $config
     * @param array $placeholders
     *
     * @return ServiceProvider\ConfigServiceProvider
     */
    protected function getConfigServiceProvider(
        string $config = 'config',
        array $placeholders = ['placeholder' => 'test']
    ): ServiceProvider\ConfigServiceProvider {
        return new ServiceProvider\ConfigServiceProvider($this->getConfigPath($config), $placeholders);
    }

    /**
     * @return ServiceProvider\ConfigServiceProvider
     */
    protected function getConfigServiceProviderForMonolog(): ServiceProvider\ConfigServiceProvider
    {
        return $this->getConfigServiceProvider('monolog/config', ['root_dir' => __DIR__]);
    }

    /**
     * @return ServiceProvider\ConfigServiceProvider
     */
    protected function getConfigServiceProviderForDoctrine(): ServiceProvider\ConfigServiceProvider
    {
        return $this->getConfigServiceProvider('doctrine/config');
    }

    /**
     * @param string $config
     *
     * @return string
     */
    protected function getConfigPath(string $config = 'config'): string
    {
        return sprintf('%s/app/config/%s.yml', __DIR__, $config);
    }
}
