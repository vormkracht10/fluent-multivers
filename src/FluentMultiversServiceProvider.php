<?php

namespace Vormkracht10\FluentMultivers;

use Illuminate\Support\ServiceProvider;
use Vormkracht10\FluentMultivers\Services\FluentMultivers;

class FluentMultiversServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/fluent-multivers.php', 'fluent-multivers');

        $this->app->singleton('fluent-multivers', function ($app) {
            return new FluentMultivers();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fluent-multivers'];
    }

    /**
     * Console-specific booting.
     */
    protected function bootForConsole()
    {
        $this->publishes([
            __DIR__.'/../config/fluent-multivers.php' => config_path('fluent-multivers.php'),
        ], 'fluent-multivers');
    }
}
