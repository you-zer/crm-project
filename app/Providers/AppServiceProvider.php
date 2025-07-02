<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\ClientServiceInterface;
use App\Services\Contracts\InteractionServiceInterface;
use App\Services\Implementations\ClientService;
use App\Services\Contracts\ProfileServiceInterface;
use App\Services\Implementations\ProfileService;
use App\Services\Contracts\UserServiceInterface;
use App\Services\Implementations\UserService;
use App\Services\Implementations\InteractionService;

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
        $this->app->bind(
            InteractionServiceInterface::class,
            InteractionService::class
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
