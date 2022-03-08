<?php

namespace App\Providers;

use App\View\Composers\MenuComposer;
use App\View\Composers\CartComposer;
use App\View\Composers\SliderComposer;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('header', MenuComposer::class);
        View::composer('carts', CartComposer::class);
        View::composer('sliders', SliderComposer::class);
    }
}
