<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\validation\Rules\Password;
use app\Models\User;

class RegisterUserController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'min:5', 'max:255', 'string'],
            'email' => 'required|email|unique:users',
            'pasword' => ['required', 'min:8', 'confirmed', Password::defaults()],
            'content' => ['required','min:10'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->pssword,
        ]);

        auth()->login($user);

        return to_route('posts.index');
    }
}
