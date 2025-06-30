<?php

declare(strict_types=1);

namespace App\Services\Implementations;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Services\Contracts\UserServiceInterface;

final class UserService implements UserServiceInterface
{
    public function assignRole(User $user, string $role): void
    {
        if (!Role::where('name', $role)->exists()) {
            throw new \InvalidArgumentException("Role '{$role}' does not exist.");
        }

        $user->syncRoles([$role]);
    }
}
