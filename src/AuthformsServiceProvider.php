<?php namespace EvolutionCMS\Authforms;

use EvolutionCMS\Authforms\Console\Commands\CreateAuthformsRedirectDocument;
use EvolutionCMS\Authforms\Middleware\CheckAuthentication;
use EvolutionCMS\ServiceProvider;

class AuthformsServiceProvider extends ServiceProvider
{

    protected $namespace = 'authforms';

    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . "/../routes.php");
        $this->commands([
            CreateAuthformsRedirectDocument::class,
        ]);
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../lang', $this->namespace);
        $this->publishes([
            __DIR__ . '/../publishable/assets'  => MODX_BASE_PATH . 'assets',
            __DIR__ . '/../publishable/core' => MODX_BASE_PATH . 'core',
            __DIR__ . '/../publishable/views' => MODX_BASE_PATH . 'views',
        ]);
    }
}
