<?php
namespace ASSoftware\Laravel;
use Illuminate\Support\ServiceProvider;
class LaravelServiceProvider extends ServiceProvider
{
    /**
    * Make config publishment optional by merging the config from the package.
    *
    * @return  void
    */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/app.php',
            'app'
        );
    }
    
    /**
    * Publishes configuration file.
    *
    * @return  void
    */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/app.php' => config_path('app.php'),
        ]);
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