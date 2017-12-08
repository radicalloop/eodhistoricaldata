<?php

namespace RadicalLoop\Eod;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;

class EodServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $source = realpath($raw = __DIR__ . '/../config/eod.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('eod.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('eod');
        }

        $this->mergeConfigFrom($source, 'eod');
    }

    public function register()
    {
        $this->app->singleton('radicalloop.eod', function (Container $app) {
            return new Eod(new Config(config('eod.api_token')));
        });
    }
}
