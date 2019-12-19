<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(User $user)
    {
        $connected = (auth()->user()) ? auth()->user()->links->contains($user->id): false;

        return view('profiles.index',  compact('user', 'connected'));

    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));

    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);


        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'url' => 'nullable|url',

        ]);

        if (request('image')){

            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray =  ['image' => $imagePath ];
        }

            auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/$user->id");


    }
    public function show(User $user)
    {

        return view('profiles.show', compact('user'));
    }

}


