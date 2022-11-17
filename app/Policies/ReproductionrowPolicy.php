<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reproductionrow;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReproductionrowPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('reproductions.index');
    }

    public function view(User $user, Reproductionrow $reproductionrow)
    {
        return $user->can('reproductions.index');
    }
    
    public function viewAnyDeleted(User $user)
    {
        return $user->can('reproductions.destroy');
    }

    public function create(User $user)
    {
        return $user->can('reproductions.store');
    }

    public function update(User $user, Reproductionrow $reproductionrow)
    {
        return $user->can('reproductions.store');
    }

    public function delete(User $user, Reproductionrow $reproductionrow)
    {
        return $reproductionrow->deleted_at === null 
            && $user->can('reproductions.destroy');
    }

    public function restore(User $user, Reproductionrow $reproductionrow)
    {
        return $reproductionrow->deleted_at !== null 
            && $user->can('reproductions.destroy');
    }

    public function forceDelete(User $user, Reproductionrow $reproductionrow)
    {
        //
    }
}
