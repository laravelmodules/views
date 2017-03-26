<?php

namespace Modules\Views\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $rootUrlNamespace = 'Modules\Views\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @param  Router $router
     * @return void
     */
    public function before(Router $router)
    {
        //
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router)
    {
        if (!app()->routesAreCached()) {
            /**
            * Web Routes
            */
            $router->group(['middleware' => 'web', 'namespace' => $this->rootUrlNamespace, 'module' => 'views'], function()
            {
                require __DIR__ . '/../routes/web.php';
            });
            /**
            * Api Routes
            */
            $router->group(['middleware' => 'api', 'namespace' => $this->rootUrlNamespace,'prefix' => 'api', 'module' => 'views'], function()
            {
                require __DIR__ . '/../routes/api.php';
            });
        }
    }
}
