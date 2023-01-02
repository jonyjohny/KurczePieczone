<?php

namespace App\Policies;

use App\Models\BreedingReport;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BreedingReportPolicy
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

    public function viewAnyDeleted(User $user)
    {
        return $user->can('breeding.destroy');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BreedingReport  $breedingReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BreedingReport $breedingReport)
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
     * @param  \App\Models\BreedingReport  $breedingReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BreedingReport $breedingReport)
    {
        return $user->can('breeding.store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BreedingReport  $breedingReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BreedingReport $breedingReport)
    {
        return $breedingReport->deleted_at === null
        && $user->can('breeding.store');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BreedingReport  $breedingReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BreedingReport $breedingReport)
    {
        return $breedingReport->deleted_at !== null
        && $user->can('breeding.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BreedingReport  $breedingReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BreedingReport $breedingReport)
    {
        //
    }
}
