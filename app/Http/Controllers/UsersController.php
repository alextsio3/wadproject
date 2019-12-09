<?php

namespace App\Http\Controllers;


use App\User;


class UsersController extends Controller
{
    public function index(User $user)
    {
        $connected = (auth()->user()) ? auth()->user()->links->contains($user->id): false;
        $users = User::paginate(10);
        return view('users.show',  compact('users', 'connected'));
    }

}
