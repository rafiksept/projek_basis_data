<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\InputNilaiController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\GantiPassword;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CplController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\QueryController;

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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forget-password', function () {
    return view('auth.forget-password');
})->name('forget-password');

Route::get('/sign-up', function () {
    return view('auth.sign-up');
})->name('sign-up');

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);

Route::get('/raport', function () {
    return view('raportawal');
});



Route::get('/query1', [QueryController::class, 'query1']);
Route::get('/query2', [QueryController::class, 'query2']);
Route::get('/query3', [QueryController::class, 'query3']);
Route::get('/query4', [QueryController::class, 'query4']);
Route::get('/query5', [QueryController::class, 'query5']);
Route::get('/query6', [QueryController::class, 'query6']);
Route::get('/query7', [QueryController::class, 'query7']);
Route::get('/query8', [QueryController::class, 'query8']);
Route::get('/query9', [QueryController::class, 'query9']);
Route::get('/query10', [QueryController::class, 'query10']);
Route::post('/sign-up', [RegisterController::class, 'register'])->name('sign-up.process');//->middleware('guest');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/editcpmk', [CPMKController::class, 'index'])->name('import.form');
Route::post('/import-excel', [CPMKController::class, 'import'])->name('import.excel');
Route::put('/editcpmk/{data}', [CPMKController::class, 'update']);
