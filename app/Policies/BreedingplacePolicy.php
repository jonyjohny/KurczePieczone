<?php

namespace App\Policies;

use App\Models\Breedingplace;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BreedingplacePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('breeding.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Breedingplace  $breedingplace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Breedingplace $breedingplace)
    {
        return $user->can('breeding.index');
    }

    public function viewAnyDeleted(User $user)
    {
        return $user->can('breeding.destroy');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('breeding.store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Breedingplace  $breedingplace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Breedingplace $breedingplace)
    {
        return $user->can('breeding.store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Breedingplace  $breedingplace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Breedingplace $breedingplace)
    {
        return $user->can('breeding.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Breedingplace  $breedingplace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Breedingplace $breedingplace)
    {
        return $user->can('breeding.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Breedingplace  $breedingplace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Breedingplace $breedingplace)
    {
        //
    }
}
