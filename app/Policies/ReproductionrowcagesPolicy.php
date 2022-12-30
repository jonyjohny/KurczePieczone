<?php

namespace App\Policies;

use App\Models\Reproductionrowcages;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReproductionrowcagesPolicy
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
     * @param  \App\Models\Reproductionrowcages  $reproductionrowcage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Reproductionrowcages $reproductionrowcage)
    {
        return $user->can('reproductions.index');
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
     * @param  \App\Models\Reproductionrowcages  $reproductionrowcage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Reproductionrowcages $reproductionrowcage)
    {
        return $user->can('reproductions.store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reproductionrowcages  $reproductionrowcage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Reproductionrowcages $reproductionrowcage)
    {
        return $reproductionrowcage->deleted_at === null
        && $user->can('reproductions.store');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reproductionrowcages  $reproductionrowcage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Reproductionrowcages $reproductionrowcage)
    {
        return $reproductionrowcage->deleted_at !== null
        && $user->can('reproductions.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reproductionrowcages  $reproductionrowcage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Reproductionrowcages $reproductionrowcage)
    {
        //
    }
}
