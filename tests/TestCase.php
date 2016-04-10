<?php

namespace OctoLab\Silex;

use Silex\Application as SilexApplication;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array<int,CilexApplication[]>
     */
    public function applicationProvider()
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
    protected function getConfigServiceProvider($config = 'config', array $placeholders = ['placeholder' => 'test'])
    {
        return new ServiceProvider\ConfigServiceProvider($this->getConfigPath($config), $placeholders);
    }

    /**
     * @return ServiceProvider\ConfigServiceProvider
     */
    protected function getConfigServiceProviderForMonolog()
    {
        return $this->getConfigServiceProvider('monolog/config', ['root_dir' => __DIR__]);
    }

    /**
     * @return ServiceProvider\ConfigServiceProvider
     */
    protected function getConfigServiceProviderForDoctrine()
    {
        return $this->getConfigServiceProvider('doctrine/config');
    }

    /**
     * @param string $config
     *
     * @return string
     */
    protected function getConfigPath($config = 'config')
    {
        return sprintf('%s/app/config/%s.yml', __DIR__, $config);
    }
}
