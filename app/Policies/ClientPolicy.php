<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any clients.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager', 'Sales']);
    }

    /**
     * Determine whether the user can view a specific client.
     */
    public function view(User $user, Client $client): bool
    {
        return $this->viewAny($user);
    }

    /**
     * Determine whether the user can create clients.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager']);
    }

    /**
     * Determine whether the user can update a client.
     */
    public function update(User $user, Client $client): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager']);
    }

    /**
     * Determine whether the user can delete a client.
     */
    public function delete(User $user, Client $client): bool
    {
        return $user->hasRole('Admin');
    }
}
