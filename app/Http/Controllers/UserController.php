<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return User::all()->map(function ($value){
            return ['name'=> $value->name, 'id' => $value->id];
        })->toArray();
    }

}
