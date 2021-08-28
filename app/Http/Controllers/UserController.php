<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     public function index()
    {
        $index = User::all();
        return view('staff',['users' => $index]);
    }

    public function show(User $user)
    {
        return view('profile.show');
    }
}
