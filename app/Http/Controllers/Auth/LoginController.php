<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication successful, redirect user to a protected page
            return redirect()->intended('/');
        } else {
            // Invalid credentials, redirect back to the login page with an error
            return redirect()->route('login')->withErrors(['message' => 'email atau password salah, coba ulang']);
        }
        
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
