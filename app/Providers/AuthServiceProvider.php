<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Client;
use App\Models\Comment;
use App\Models\Deal;
use APP\Models\Interaction;
use App\Models\Task;
use App\Policies\ClientPolicy;
use App\Policies\CommentPolicy;
use App\Policies\DealPolicy;
use App\Policies\InteractionPolicy;
use App\Policies\TaskPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Политики приложения.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Client::class => ClientPolicy::class,
        Interaction::class => InteractionPolicy::class,
        Comment::class => CommentPolicy::class,
        Task::class => TaskPolicy::class,
        Deal::class => DealPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
