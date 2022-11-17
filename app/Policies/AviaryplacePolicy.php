<?php

namespace App\Policies;

use App\Models\AviaryPlace;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AviaryplacePolicy
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
        return $user->can('aviaries.index');
    }

    public function viewAnyDeleted(User $user)
    {
        return $user->can('aviaries.destroy');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AviaryPlace  $aviaryPlace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AviaryPlace $aviaryPlace)
    {
        return $user->can('aviaries.index');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('aviaries.store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AviaryPlace  $aviaryPlace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AviaryPlace $aviaryPlace)
    {
        return $user->can('aviaries.store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AviaryPlace  $aviaryPlace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AviaryPlace $aviaryPlace)
    {
        return $aviaryPlace->deleted_at === null 
        && $user->can('aviaries.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AviaryPlace  $aviaryPlace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AviaryPlace $aviaryPlace)
    {
        return $aviaryPlace->deleted_at !== null 
        && $user->can('aviaries.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AviaryPlace  $aviaryPlace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AviaryPlace $aviaryPlace)
    {
        //
    }
}
