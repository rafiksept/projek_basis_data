<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('example');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forget-password', function () {
    return view('auth.forget-password');
})->name('forget-password');

Route::get('/sign-up', function () {
    return view('auth.sign-up');
})->name('sign-up');
Route::post('/sign-up', [RegisterController::class, 'register'])->name('sign-up.process');

Route::get('/new-acc', function () {
    return view('new-acc');
})->name('new-acc');

Route::middleware(['auth', 'verified'])->group(function () {
    // Routes that require email verification
});

// Email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('verify-email/{token}', [VerificationController::class, 'verify'])->name('verify-email');
