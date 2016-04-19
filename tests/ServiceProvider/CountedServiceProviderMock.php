<?php

declare(strict_types = 1);

namespace OctoLab\Silex\ServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
final class CountedServiceProviderMock implements ServiceProviderInterface
{
    /** @var int */
    private static $counter = 0;

    /**
     * @return int
     */
    public static function getCounter()
    {
        return self::$counter;
    }

    public static function resetCounter()
    {
        self::$counter = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
        self::$counter++;
    }
}
