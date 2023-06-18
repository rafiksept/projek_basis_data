<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use App\Models\User;


class VerificationController extends Controller
{
    public function verify(Request $request, $id, $hash)
{
    $user = User::findOrFail($id);

    if ($user->hasVerifiedEmail()) {
        return redirect('/')->with('message', 'Your email has already been verified.');
    }

    if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        return redirect('/')->with('message', 'Invalid verification link.');
    }

    $user->markEmailAsVerified();

    event(new Verified($user));

    return redirect('/login')->with('verifyMessage', 'Silahkan login untuk memverifikasi akun Anda');

}




    

}
