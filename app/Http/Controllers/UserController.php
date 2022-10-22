<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view(
            'users.index',
            [
                'users' => User::with('roles')->get()
            ]
        );
    }

    public function create()
    {
        return view(
            'users.form'
        );
    }

    public function edit(User $user)
    {
        return view(
            'users.form',
            [
                'user' => $user,
            ],
            );
    }

}
