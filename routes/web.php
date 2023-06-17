<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::post('/sign-up', [RegisterController::class, 'register'])->name('sign-up.process');//->middleware('guest');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
