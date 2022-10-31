<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Incubationincubator;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncubationincubatorPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('incubations.index');
    }

    public function view(User $user, Incubationincubator $incubationincubator)
    {
        return $user->can('incubations.index');
    }

    public function viewAnyDeleted(User $user)
    {
        return $user->can('incubations.destroy');
    }
    
    public function create(User $user)
    {
        return $user->can('incubations.store');
    }

    public function update(User $user, Incubationincubator $incubationincubator)
    {
        return $user->can('incubations.store');
    }

    public function delete(User $user, Incubationincubator $incubationincubator)
    {
        return $user->can('incubations.destroy');
    }

    public function restore(User $user, Incubationincubator $incubationincubator)
    {
        return $user->can('incubations.destroy');
    }

    public function forceDelete(User $user, Incubationincubator $incubationincubator)
    {
        //
    }
}