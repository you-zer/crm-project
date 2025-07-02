<?php
declare(strict_types=1);

namespace App\Policies;

use App\Models\Interaction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InteractionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any interactions.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager', 'Sales']);
    }

    /**
     * Determine whether the user can view a specific interaction.
     */
    public function view(User $user, Interaction $interaction): bool
    {
        return $this->viewAny($user);
    }

    /**
     * Determine whether the user can create interactions.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager']);
    }

    /**
     * Determine whether the user can update the interaction.
     */
    public function update(User $user, Interaction $interaction): bool
    {
        // Admins or the creator of the interaction can update
        return $user->hasAnyRole(['Admin', 'Manager']);
    }

    /**
     * Determine whether the user can delete the interaction.
     */
    public function delete(User $user, Interaction $interaction): bool
    {
        // Admins or the creator of the interaction can delete
        return $user->hasAnyRole(['Admin', 'Manager']);
    }
}
