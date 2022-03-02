<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Startpoint;
use App\Endpoint;

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
        // View::share('key', 'value');
        view::composer(['*'], function ($view) {
            $view->with('startpoints' , Startpoint::orderBy('id')->get() );
        });

        view::composer(['*'], function ($view) {
            $view->with('endpoints' , Endpoint::orderBy('id')->get() );
        });
    }
}
