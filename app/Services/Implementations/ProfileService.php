<?php

declare(strict_types=1);

namespace App\Services\Implementations;

use App\Services\Contracts\ProfileServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

final class ProfileService implements ProfileServiceInterface
{
    public function update(array $data): User
    {
        $user = Auth::user();
        if ($user->email !== $data['email']) {
            $user->email_verified_at = null;
        }
        $user->fill($data);
        $user->save();
        return $user->refresh();
    }

    public function changePassword(string $currentPassword, string $newPassword): bool
    {
        $user = Auth::user();

        if (!Hash::check($currentPassword, $user->password)) {
            return false;
        }

        $user->password = Hash::make($newPassword);

        return DB::transaction(function () use ($user): bool {
            return $user->save();
        });
    }

    public function updateAvatar(int $userId, string $path): User
    {
        $user = User::findOrFail($userId);
        $user->avatar_path = $path;
        $user->save();
        return $user->refresh();
    }
}
