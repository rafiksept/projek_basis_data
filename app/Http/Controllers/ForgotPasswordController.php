<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email',
        ]);

        // Generate the password reset token
        $token = Str::random(60);

        // Save the token in the database
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Send the reset link email
        $this->sendResetEmail($request->email, $token);

        // Return the response
        return back()->with('success', 'Token reset password sudah dikirim, silahkan cek emailmu');
    }

    private function sendResetEmail($email, $token)
    {
        // Build the reset link URL
        $resetUrl = route('reset-password', ['token' => $token]);

        // Send the email
        Mail::send('emails.reset-password', ['resetUrl' => $resetUrl], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Reset Password');
        });
    }
}
