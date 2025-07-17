<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
    public function boot(): void
    {
        View::composer('*', function ($view) {
        $cart = session()->get('cart', []);
        $cartCount = is_array($cart) ? array_sum(array_column($cart, 'quantity')) : 0;
        $view->with('cartCount', $cartCount);
    });
    }
}
