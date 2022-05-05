<?php

namespace Kuraykaraaslan\Supreme;

use Exception;
use Illuminate\Support\ServiceProvider;

class SupremeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadTranslationsFrom(__DIR__ . '/Languages', 'supreme');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('supreme', function () {
            return new Supreme();
        });

        $this->app->bind('supreme-seo', function () {
            return new SupremeSEO();
        });

        $this->app->bind('supreme-lang', function () {
            return new SupremeLang();
        });

        $this->loadRoutesFrom(__DIR__ . '/Routes/Web.php', 'supreme');

        $this->loadViewsFrom(__DIR__ . '/Views', 'supreme');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Supreme', Supreme::class);
        $loader->alias('SupremeSEO', SupremeSEO::class);
        $loader->alias('SupremeLang', SupremeLang::class);
    }

}
