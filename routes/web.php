<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\InputNilaiController;
use App\Http\Controllers\CPMKController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\GantiPassword;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CplController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CPLRNController;
use App\Http\Controllers\CPLTEController;
use App\Http\Controllers\CPLTIController;
use App\Http\Controllers\CPLTSDController;
use App\Http\Controllers\CPLTRKBController;

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



Route::get('/viewIndex', [IndexController::class, 'viewIndex'])->name('viewIndex')-> middleware(['auth','adminrole']); //Untuk Controller Tampilan Awal
Route::get('/viewCpl', [CplController::class, 'viewCPL'])->name('viewCPL')-> middleware(['auth','adminrole']); //Untuk Controller Tampilan CPL


Route::get('/edit-profile', function () {return view('edit-profile');});
Route::put('/update-profile', [Profile::class, 'updateProfile'])->name('update-profile');
Route::put('/resetPassword', [GantiPassword::class, 'updatePassword'])->name('updatePassword');

Route::get('/melihatMahasiswa',[MahasiswaController::class, 'viewMahasiswa']);
Route::get('/inputMahasiswa',[MahasiswaController::class, 'createMahasiswa']);
Route::post('/actionInputMahasiswa',[MahasiswaController::class, 'actionCreateMahasiswa']);

Route::get('/inputNilai', [InputNilaiController::class, "inputNilai"]) -> middleware(['auth','pjmkrole']);
Route::post('/inputNilaiMahasiswa/{kelas}', [InputNilaiController::class, "inputNilaiMahasiswa"]) -> middleware(['auth','pjmkrole']);
Route::get('/getMatkul/{prodi}',[InputNilaiController::class, "getMatkul"]) -> middleware(['auth','pjmkrole']);
Route::get('/getMahasiswa/{matkul}',[InputNilaiController::class, "getMahasiswa"]) -> middleware(['auth','pjmkrole']);

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
Route::get('/logout', [LoginController::class, 'logout'])->name('logout') -> middleware(['auth']);
Route::get('/', [LoginController::class, 'viewUser'])->name('logout') -> middleware(['auth']);


// forget-password button from login page
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout') -> middleware('auth');

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
})  -> middleware(['auth','prodirole']);



Route::get('/query1', [QueryController::class, 'query1'])  -> middleware(['auth','prodirole']);
Route::get('/query2', [QueryController::class, 'query2'])  -> middleware(['auth','prodirole']);
Route::get('/query3', [QueryController::class, 'query3'])  -> middleware(['auth','prodirole']);
Route::get('/query4', [QueryController::class, 'query4'])  -> middleware(['auth','prodirole']);
Route::get('/query5', [QueryController::class, 'query5'])  -> middleware(['auth','prodirole']);
Route::get('/query6', [QueryController::class, 'query6'])  -> middleware(['auth','prodirole']);
Route::get('/query7', [QueryController::class, 'query7'])  -> middleware(['auth','prodirole']);
Route::get('/query8', [QueryController::class, 'query8'])  -> middleware(['auth','prodirole']);
Route::get('/query9', [QueryController::class, 'query9'])  -> middleware(['auth','prodirole']);
Route::get('/query10', [QueryController::class, 'query10'])  -> middleware(['auth','prodirole']);
Route::post('/sign-up', [RegisterController::class, 'register'])->name('sign-up.process')  -> middleware(['auth','prodirole']);//->middleware('guest');
Route::post('/sign-up', [RegisterController::class, 'register'])->name('sign-up.process')  -> middleware(['auth','prodirole']);

Route::get('/new-acc', function () {
    return view('new-acc');
})->name('new-acc') -> middleware('auth');

// Email verification routes
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Auth::routes(['verify' => true]);

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home') -> middleware('auth');

Route::get('/editcpmk', [CPMKController::class, 'index'])->name('import.form') -> middleware(['auth','adminrole']) ;
Route::post('/import-excel', [CPMKController::class, 'import'])->name('import.excel') -> middleware(['auth','adminrole']);
Route::put('/editcpmk/{data}', [CPMKController::class, 'update']) -> middleware(['auth','adminrole']);
Route::put('/tsd/{data}', [CPLTSDController::class, 'update']) -> middleware(['auth','adminrole']);
Route::put('/ti/{data}', [CPLTIController::class, 'update']) -> middleware(['auth','adminrole']);
Route::put('/te/{data}', [CPLTEController::class, 'update']) -> middleware(['auth','adminrole']);
Route::put('/trkb/{data}', [CPLTRKBController::class, 'update']) -> middleware(['auth','adminrole']);
Route::put('/rn/{data}', [CPLRNController::class, 'update']) -> middleware(['auth','adminrole']);
