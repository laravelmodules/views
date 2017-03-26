<?php

namespace Modules\Views\Providers;

use Illuminate\Support\ServiceProvider;

class ViewsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        // $this->app->register(SidebarServiceProvider::class);
        $this->app->register(BreadcrumbsServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('module/views/views.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'module.views.views'
        );
        /**
         * Backend
         */
        $this->publishes([
            __DIR__.'/../Config/backend.php' => config_path('backend.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/backend.php', 'backend'
        );
        /**
         * Dashboard
         */
        $this->publishes([
            __DIR__.'/../Config/dashboard.php' => config_path('dashboard.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/dashboard.php', 'dashboard'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/views');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/views';
        }, \Config::get('view.paths')), [$sourcePath]), 'views');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/views');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'views');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'views');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
