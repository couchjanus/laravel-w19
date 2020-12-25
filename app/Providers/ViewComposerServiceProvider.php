<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.site-navigation', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });
    }
}



