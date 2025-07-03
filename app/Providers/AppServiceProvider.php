<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\ClientServiceInterface;
use App\Services\Contracts\CommentServiceInterface;
use App\Services\Contracts\InteractionServiceInterface;
use App\Services\Implementations\ClientService;
use App\Services\Contracts\ProfileServiceInterface;
use App\Services\Contracts\TaskServiceInterface;
use App\Services\Implementations\ProfileService;
use App\Services\Contracts\UserServiceInterface;
use App\Services\Implementations\CommentService;
use App\Services\Implementations\UserService;
use App\Services\Implementations\InteractionService;
use App\Services\Implementations\TaskService;

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
        $this->app->bind(
            CommentServiceInterface::class,
            CommentService::class
        );
        $this->app->bind(
            TaskServiceInterface::class,
            TaskService::class,
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
