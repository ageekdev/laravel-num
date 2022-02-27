<?php

namespace GenieFintech\Num;

use Illuminate\Support\ServiceProvider;

class NumServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/num.php' => config_path('num.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/num.php', 'num');

        $this->app->singleton('num', function ($app) {
            return new Num();
        });
    }
}
