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

    public function viewUser(){
        if (!Auth::user()) {
            return redirect('/login');
        } else {
            $user = Auth::user();
            if ($user -> role_id == 1) {
                return redirect()->intended('/inputNilai');
            } elseif ($user -> role_id == 3) {
                return redirect()->intended('/raport');
            }
            else {
                return redirect()->intended('/viewIndex');
            }
            
        }
        
    }

    public function login(Request $request)
    {
        $credentials = $request->only('password');

        // Check if the input contains '@'
        if (strpos($request->input('email'), '@') !== false) {
            // If '@' is present, search for 'email' field
            $credentials['email'] = $request->input('email');
        } else {
            // If '@' is not present, search for 'nik' field
            $credentials['nik'] = $request->input('email');
            unset($credentials['email']); // Remove the 'email' key from credentials
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->email_verified_at !== null) {
                // Authentication successful and user is verified, redirect user to a protected page
                if ($user -> role_id == 1) {
                    return redirect()->intended('/inputNilai');
                } elseif ($user -> role_id == 3) {
                    return redirect()->intended('/raport');
                }
                
                else {
                    return redirect()->intended('/viewIndex');
                }
                
                
            } else {
                // User is not verified, show error message
                return redirect()->route('login')->withErrors(['message' => 'Verifikasi email Anda terlebih dahulu!']);
            }
        } else {
            // Invalid credentials, redirect back to the login page with an error
            return redirect()->route('login')->withErrors(['message' => 'Detail akun salah! silahkan coba lagi']);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
