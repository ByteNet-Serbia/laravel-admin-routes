<?php

/**
 * Created by Byte Net IT Company.
 *
 * PHP version 7.1
 *
 * @package ByteNet\LaravelAdminRoutes
 * @author  Byte Net <office@bytenet.rs>
 * @license http://bytenet.rs/licenses/btnt-license-v1-0 BTNT-License v1.0
 * @link    http://bytenet.rs Byte Net IT company
 */

namespace ByteNet\LaravelAdminRoutes;

use Illuminate\Support\ServiceProvider;
use Route;

/**
 * Class RoutesServiceProvider
 *
 * @package ByteNet\LaravelAdminRoutes
 */
class RoutesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //\DB::listen(function ($query) {
        //    echo "<div style='border: 1px solid red; background: #fbc8c8; display: inline-block'>{$query->sql}</div>";
        //});

        // LOAD THE VIEWS
        // - first the published views (in case they have any changes)
        $this->loadViewsFrom(resource_path('views/vendor/bytenet/laravel-admin-routes'), 'bytenet.routes');
        // - then the stock views that come with the package, in case a published view might be missing
        $this->loadViewsFrom(realpath(__DIR__ . '/resources/views'), 'bytenet.routes');

        // use the vendor translation file as fallback
        $this->loadTranslationsFrom(realpath(__DIR__ . '/resources/lang'), 'bytenet.admin-routes');

        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(__DIR__ . '/config/bytenet/admin-routes.php', 'bytenet.admin-routes');

        $this->map();

        // -------------
        // PUBLISH FILES
        // -------------
        // publish config file
        $this->publishes([__DIR__.'/config' => config_path()], 'config');
        // publish lang files
        $this->publishes([__DIR__.'/resources/lang' => resource_path('lang/vendor/bytenet')], 'lang');
        // publish views
        $this->publishes(
            [__DIR__.'/resources/views' => resource_path('views/vendor/bytenet/laravel-admin-routes')],
            'views'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // register the current package
        $this->app->bind('bytenet.admin.routes', function ($app) {
            return new Base($app);
        });
    }


    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => ['web','bytenet.auth'],
            'prefix' => config('bytenet.base.route_prefix'),
            'namespace' => 'ByteNet\LaravelAdminRoutes\app\Http\Controllers',
            'as' => config('bytenet.base.route_prefix').'::',
        ], function ($router) {
            require __DIR__ . '/routes/web.php';
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        //
    }
}
