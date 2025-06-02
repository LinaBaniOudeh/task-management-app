<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    // Ensure Gate is usable
    $this->app->singleton('Illuminate\Contracts\Auth\Access\Gate', function ($app) {
        return new \Illuminate\Auth\Access\Gate($app, function () {
            return null; // no user
        });
    });    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
