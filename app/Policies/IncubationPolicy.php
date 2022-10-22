<?php

namespace App\Policies;

use App\Models\Incubation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncubationPolicy
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
        return $user->can('incubations.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Incubation  $incubation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Incubation $incubation)
    {
        return $user->can('incubations.index');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('incubations.store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Incubation  $incubation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Incubation $incubation)
    {
        return $incubation->deleted_at === null 
            && $user->can('incubations.store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Incubation  $incubation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Incubation $incubation)
    {
        return $incubation->deleted_at === null 
            && $user->can('incubations.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Incubation  $incubation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Incubation $incubation)
    {
        return $incubation->deleted_at !== null 
            && $user->can('incubations.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Incubation  $incubation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Incubation $incubation)
    {
        //
    }
}
