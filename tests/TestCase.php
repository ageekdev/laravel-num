<?php

namespace AgeekDev\Num\Tests;

use AgeekDev\Num\NumServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            NumServiceProvider::class,
        ];
    }
}
