<?php

namespace App\Policies;

use App\Models\Aviary;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AviaryPolicy
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

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Aviary  $aviary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Aviary $aviary)
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
     * @param  \App\Models\Aviary  $aviary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Aviary $aviary)
    {
        return $aviary->deleted_at === null 
            && $user->can('aviaries.store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Aviary  $aviary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Aviary $aviary)
    {
        return $aviary->deleted_at === null 
            && $user->can('aviaries.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Aviary  $aviary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Aviary $aviary)
    {
        return $aviary->deleted_at !== null 
            && $user->can('aviaries.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Aviary  $aviary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Aviary $aviary)
    {
        //
    }
}
