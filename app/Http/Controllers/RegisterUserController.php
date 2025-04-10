<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            'password' => ['required', 'min:8', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return to_route('posts.index');
    }
}
