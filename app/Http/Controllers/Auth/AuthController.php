<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email:dns',
            'password'  => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // if(Auth::user()->role == 'admin')
            // {
            //     return redirect()->intended('/admin');
            // }
            return redirect()->intended();
        }
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
