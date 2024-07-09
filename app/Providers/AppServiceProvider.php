<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // pass user name to different components 
    public function boot()
    {
        View::composer('components.layout', function ($view) {
            $userName = Auth::user()->name;
            $view->with('userName', $userName);
        });
        View::composer('home', function ($view) {
            $userName = Auth::user()->name;
            $view->with('userName', $userName);
        });
    }
}
