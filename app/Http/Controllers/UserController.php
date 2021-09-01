<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     public function index()
    {
        $index = User::paginate(6);
        return view('staff',['users' => $index]);
    }

    public function show(User $user)
    {
         return view('profile.show', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {

        $user->update($request->only('name','email'));

        if ($request->input('password')) {
            $user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return view('profile.show')->with(['message'=>'Profile updated successfully.','user' => $user]);
    }
}
