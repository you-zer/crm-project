<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\User;

interface UserServiceInterface
{
    /**
     * Назначает пользователю одну роль.
     *
     * @throws \InvalidArgumentException если роль не существует
     */
    public function assignRole(User $user, string $role): void;
}
