<?php
namespace ASSoftware\Laravel;
use Illuminate\Support\ServiceProvider;
class LaravelServiceProvider extends ServiceProvider
{
    /**
    * Publishes configuration file.
    *
    * @return  void
    */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        #$this->loadViewsFrom(__DIR__.'/resources/views','as-software/laravel');
        $this->publishes([
            __DIR__.'/app' => app_path()
        ]);
        $this->publishes([
            __DIR__.'/routes' => base_path('routes')
        ], 'routes');
    }
}