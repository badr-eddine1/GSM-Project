<?php

namespace App\Policies;

use App\Models\Puce;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PucePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Puce $puce): bool
    {
        return $user->profile == 'Admin'||$user->profile =='Operateur';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->profile == 'Admin'||$user->profile =='Operateur';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Puce $puce): bool
    {
        return $user->profile == 'Admin'||$user->profile =='Operateur';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Puce $puce): bool
    {
        return $user->profile == 'Admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Puce $puce): bool
    {
        return $user->profile == 'Admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Puce $puce): bool
    {
        return $user->profile == 'Admin';
    }
}
