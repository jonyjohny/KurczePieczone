<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        return view(
            'users.index',
            [
                'users' => User::with('roles')->get()
            ]
        );
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view(
            'users.form'
        );
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view(
            'users.form',
            [
                'user' => $user,
            ],
            );
    }

    public function allOpen()
    {
        return User::with("roles")->whereHas("roles", function($q) {
            $q->whereIn("name", ["worker"]);
        })->get();
    }

public function allRoles(Request $request): Collection
{
    return Role::query()
        ->select('id', 'name')
        ->orderBy('name')
        ->when(
            $request->search,
            fn (Builder $query) => $query
                ->where('name', 'like', "%{$request->search}%")
        )
        ->when(
            $request->exists('selected'),
            fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            fn (Builder $query) => $query->limit(10)
        )
        ->get()
        ->map(function (Role $roles) {
            return $roles;
        });
}
}
