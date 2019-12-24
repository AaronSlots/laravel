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
        $this->loadViewsFrom(__DIR__.'/resources/views', 'ASSoftware/Laravel');
        $this->publishes([
            __DIR__.'/resources/templates' => resource_path('views/cms'),
            __DIR__.'/resources/sass' => resource_path('sass')
        ]);
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        exec('npm install jquery');
        exec('npm install popper.js');
        exec('npm install bootstrap');
    }
}
