<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\Providers\Passport;

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
        //
       // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
    }
}
