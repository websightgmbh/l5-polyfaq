<?php

namespace Websight\Polyfaq;

use Illuminate\Support\ServiceProvider;

/**
 * Class PolyfaqServiceProvider
 *
 * @package Websight\Polyfaq
 */
class PolyfaqServiceProvider extends ServiceProvider
{
    /**
     * Register the package to the framework
     */
    public function boot()
    {
        /**
         * Custom views can be referenced with 'polyfaq::'
         */
        $this->loadViewsFrom(__DIR__ . '/../views', 'polyfaq');

        /**
         * You may reference translations with "trans('polyfaq::messages.example')"
         *
         * @see http://laravel.com/docs/5.1/packages#translations
         */
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'polyfaq');

        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/../routes.php';
        }

        $this->publishes([
            __DIR__ . '/../config/polyfaq.php' => config_path('polyfaq.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../migrations/' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../lang' => app_path('resources/lang/vendor/polyfaq'),
        ], 'translations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/polyfaq.php', 'polyfaq'
        );
    }
}
