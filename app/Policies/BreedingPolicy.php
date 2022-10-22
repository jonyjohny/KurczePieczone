<?php

namespace App\Policies;

use App\Models\Breeding;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BreedingPolicy
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
     * @param  \App\Models\Breeding  $breeding
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Breeding $breeding)
    {
        return $user->can('breeding.index');
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
     * @param  \App\Models\Breeding  $breeding
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Breeding $breeding)
    {
        return $breeding->deleted_at === null 
            && $user->can('breeding.store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Breeding  $breeding
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Breeding $breeding)
    {
        return $breeding->deleted_at === null 
            && $user->can('breeding.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Breeding  $breeding
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Breeding $breeding)
    {
        return $breeding->deleted_at !== null 
            && $user->can('breeding.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Breeding  $breeding
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Breeding $breeding)
    {
        //
    }
}
