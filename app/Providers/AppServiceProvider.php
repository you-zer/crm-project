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
        $this->app->bind(
            \App\Services\Contracts\ClientServiceInterface::class,
            \App\Services\Implementations\ClientService::class
        );
        $this->app->bind(
            \App\Services\Contracts\ProfileServiceInterface::class,
            \App\Services\Implementations\ProfileService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
