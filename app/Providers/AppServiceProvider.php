<?php

namespace App\Providers;
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
        // view()->composer('layout.main', function ($view) {
        //     $currencies = SupportedCurrency::orderBy('default','DESC')->get();
        //     $view->with(['currencies' => $currencies]);
        // });
    }
}
