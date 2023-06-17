<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\InputNilaiController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\GantiPassword;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CplController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/viewIndex', [IndexController::class, 'viewIndex'])->name('viewIndex'); //Untuk Controller Tampilan Awal
Route::get('/viewCpl', [CplController::class, 'viewCPL'])->name('viewCPL'); //Untuk Controller Tampilan CPL


Route::get('/edit-profile', function () {return view('edit-profile');});
Route::put('/update-profile', [Profile::class, 'updateProfile'])->name('update-profile');
Route::put('/resetPassword', [GantiPassword::class, 'updatePassword'])->name('updatePassword');

Route::get('/melihatMahasiswa',[MahasiswaController::class, 'viewMahasiswa']);
Route::get('/inputMahasiswa',[MahasiswaController::class, 'createMahasiswa']);
Route::post('/actionInputMahasiswa',[MahasiswaController::class, 'actionCreateMahasiswa']);

Route::get('/inputNilai', [InputNilaiController::class, "inputNilai"]);
Route::post('/inputNilaiMahasiswa/{kelas}', [InputNilaiController::class, "inputNilaiMahasiswa"]);
Route::get('/getMatkul/{prodi}',[InputNilaiController::class, "getMatkul"]);
Route::get('/getMahasiswa/{matkul}',[InputNilaiController::class, "getMahasiswa"]);

// // Display the login form
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

// // Handle the login form submission
// Route::post('/login', 'Auth\LoginController@login');

// // Logout the user
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


// Display the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle the login form submission
Route::post('/login', [LoginController::class, 'login'])->middleware('web');

// Logout the user
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// forget-password button from login page
Route::get('/forget-password', function () {
    return view('auth.forget-password');
})->name('forget-password');


// sign-up button from login page
Route::get('/sign-up', function () {
    return view('auth.sign-up');
})->name('sign-up');

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);