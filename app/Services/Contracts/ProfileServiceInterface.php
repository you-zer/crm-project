<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\User;

interface ProfileServiceInterface
{
    public function update(array $data): User;

    public function changePassword(string $currentPassword, string $newPassword): bool;

    public function updateAvatar(int $userId, string $path): User;
}
