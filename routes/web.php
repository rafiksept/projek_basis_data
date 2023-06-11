<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\InputNilaiController;
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

Route::get('/', function () {
    return view('example');
});

Route::get('/melihatMahasiswa',[MahasiswaController::class, 'viewMahasiswa']);
Route::get('/inputMahasiswa',[MahasiswaController::class, 'createMahasiswa']);
Route::post('/actionInputMahasiswa',[MahasiswaController::class, 'actionCreateMahasiswa']);

Route::get('/inputNilai', [InputNilaiController::class, "inputNilai"]);
Route::get('/inputNilaiMahasiswa/{kelas}', [InputNilaiController::class, "inputNilaiMahasiswa"]);
Route::get('/getMatkul/{prodi}',[InputNilaiController::class, "getMatkul"]);
Route::get('/getMahasiswa/{matkul}',[InputNilaiController::class, "getMahasiswa"]);