<?php

namespace AgeekDev\Num\Tests;

use AgeekDev\Num\NumServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    use DataTestHelper;

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            NumServiceProvider::class,
        ];
    }
}
