<?php

namespace App\Providers;

use App\View\Composers\CartComposer;
use App\View\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view::composer('header',MenuComposer::class);
        view::composer('cart',CartComposer::class);
    }
}
