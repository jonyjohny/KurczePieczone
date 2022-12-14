<?php

namespace App\Policies;

use App\Models\IncubationReport;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncubationReportPolicy
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

    public function viewAnyDeleted(User $user)
    {
        return $user->can('incubations.destroy');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IncubationReport  $incubationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, IncubationReport $incubationReport)
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
     * @param  \App\Models\IncubationReport  $incubationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, IncubationReport $incubationReport)
    {
        return $user->can('incubations.store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IncubationReport  $incubationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, IncubationReport $incubationReport)
    {
        return $incubationReport->deleted_at === null 
        && $user->can('incubations.store');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IncubationReport  $incubationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, IncubationReport $incubationReport)
    {
        return $incubationReport->deleted_at !== null 
        && $user->can('incubations.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IncubationReport  $incubationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, IncubationReport $incubationReport)
    {
        //
    }
}
