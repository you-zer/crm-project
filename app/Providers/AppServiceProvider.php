<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\ClientServiceInterface;
use App\Services\Implementations\ClientService;
use App\Services\Contracts\ProfileServiceInterface;
use App\Services\Implementations\ProfileService;
use App\Services\Contracts\UserServiceInterface;
use App\Services\Implementations\UserService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ClientServiceInterface::class,
            ClientService::class
        );
        $this->app->bind(
            ProfileServiceInterface::class,
            ProfileService::class
        );
        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
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
