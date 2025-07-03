<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Deal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DealPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager', 'Sales']);
    }

    public function view(User $user, Deal $deal): bool
    {
        return $this->viewAny($user);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager', 'Sales']);
    }

    public function update(User $user, Deal $deal): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager']);
    }

    public function delete(User $user, Deal $deal): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager']);
    }
}
