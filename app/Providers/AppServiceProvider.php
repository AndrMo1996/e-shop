<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('routeactive', function($route){
            return "<?php
                echo Route::currentRouteNamed($route) ? 'class=\"nav-menu__item active\"': 'class=\"nav-menu__item\"'
            ?>";
        });

        Blade::directive('deleted', function($product){
            return "<?php
                echo product ? 'deleted': ''
            ?>";
        });

        Paginator::useBootstrap();
    }
}
