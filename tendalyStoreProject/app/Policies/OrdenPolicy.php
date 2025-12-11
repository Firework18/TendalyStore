<?php

namespace App\Policies;

use App\Models\Orden;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrdenPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Orden $orden): bool
    {
        if ($user->id === $orden->user_id) {
            return true;
        }

        if ($orden->negocio && $orden->negocio->user_id === $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Orden $orden): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Orden $orden): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Orden $orden): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Orden $orden): bool
    {
        return false;
    }
}
