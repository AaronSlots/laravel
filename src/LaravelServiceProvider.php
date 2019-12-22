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
        $this->publishes([
            __DIR__.'/app' => app_path(),
            __DIR__.'/resources/views' => resource_path('views')
        ]);
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
}
