<?php

namespace App\Policies;

use App\Models\Reproduction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReproductionPolicy
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
        return $user->can('reproductions.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reproduction  $reproduction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Reproduction $reproduction)
    {
        return $user->can('reproductions.index');
    }

    public function viewAnyDeleted(User $user)
    {
        return $user->can('reproductions.destroy');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('reproductions.store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reproduction  $reproduction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Reproduction $reproduction)
    {
        return $reproduction->deleted_at === null
            && $user->can('reproductions.store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reproduction  $reproduction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Reproduction $reproduction)
    {
        return $reproduction->deleted_at === null
            && $user->can('reproductions.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reproduction  $reproduction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Reproduction $reproduction)
    {
        return $reproduction->deleted_at !== null
            && $user->can('reproductions.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reproduction  $reproduction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Reproduction $reproduction)
    {
        //
    }
}
