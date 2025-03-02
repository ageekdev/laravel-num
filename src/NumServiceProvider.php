<?php

namespace AgeekDev\Num;

use Illuminate\Support\ServiceProvider;

class NumServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/num.php' => config_path('num.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/num.php', 'num');

        $this->app->singleton('num', function ($app) {
            return new Num;
        });
    }
}
