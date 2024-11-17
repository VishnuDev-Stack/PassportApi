<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
    }
}
