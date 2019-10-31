<?php

namespace Bravoh\LaravelWebInstaller\Providers;

use Illuminate\Support\ServiceProvider;

class InstallerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Bravoh\LaravelWebInstaller\Http\Controllers\InstallerController');
        $this->loadViewsFrom(dirname(__DIR__).'/resources/views', 'laravel-web-installer');
        //$this->loadMigrationsFrom(__DIR__."/Database");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/Http/routes.php';

        $this->publishes([
            dirname(__DIR__)
            .'/config/config.php' => config_path('laravel-web-installer.php'),
        ], 'laravel-web-installer');

        $this->publishes([
            dirname(__DIR__).'/public' => public_path('vendor/laravel-web-installer'),
        ], 'laravel-web-installer');
    }
}
