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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extendImplicit('current_password', function($attribute, $value, $parameters, $validator)
        {
            return \Hash::check($value, auth()->guard('admin')->user()->password);
        });
    }
}
