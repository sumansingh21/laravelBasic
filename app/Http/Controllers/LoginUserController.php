<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function store(Request $request){
         $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8,string',
        ]);

        if(Auth::guard('web')->attempt(['email'=> $request->email, 'password' => $request->password])){
            return redirect()->intended(route('posts.index'));
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our record.'
            ]);
        }

    }

    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('posts.index');
    }
}
