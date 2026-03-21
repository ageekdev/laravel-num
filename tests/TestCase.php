<?php

namespace AgeekDev\Num\Tests;

use AgeekDev\Num\NumServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param  Application  $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            NumServiceProvider::class,
        ];
    }
}
