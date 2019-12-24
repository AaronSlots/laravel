<?php

namespace ASSoftware\Laravel;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/resources/views/cms', 'ASSoftware/Laravel');
        $this->publishes([
            __DIR__.'/resources/views/templates' => resource_path('views/cms'),
        ]);
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
}
