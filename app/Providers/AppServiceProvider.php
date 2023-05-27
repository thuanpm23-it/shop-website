<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
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
        //
        view()->composer('*', function ($view) {
            $productsInCart = session('products');
            if (is_null($productsInCart)) {
                $productsInCart = [];
            }
            $cartCount = count($productsInCart);
            $view->with('cartCount', $cartCount);
        });
    }
}
