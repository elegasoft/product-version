<?php

namespace Elegasoft\ProductVersion;

use Illuminate\Support\ServiceProvider;

class ProductVersionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'product-version');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'product-version');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole())
        {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('product-version.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/product-version'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/product-version'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/product-version'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                BumpProductVersionCommand::class,
                CurrentProductVersionCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'product-version');

        // Register the main class to use with the facade
        $this->app->singleton('product-version', function ()
        {
            return new ProductVersion;
        });
    }
}
