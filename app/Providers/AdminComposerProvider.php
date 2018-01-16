<?php

namespace App\Providers;
use App\Cate;
use App\Inmueble;
use Illuminate\Support\ServiceProvider;

class AdminComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.admin', function($view){
            $view->with('categorias', Cate::all());
        });
        view()->composer('layouts.admin', function($view){
            $view->with('inmuebles', Inmueble::all());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
