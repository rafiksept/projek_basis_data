<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    
    public function viewMahasiswa(){

        $mahasiswa = DB::table('mahasiswas') -> get();
        // SELECT * FROM MAHASISWAS
        // [mahasiswa1, mahasiswa2, mahasiswa3]

        return view('mahasiswa', ['mahasiswas' => $mahasiswa]);
        // => sama kaya lambang python {key:values} 
        


    }

    public function createMahasiswa(){

        return view('inputMahasiswa');
    }

    public function actionCreateMahasiswa(Request $request){

        $validatedData = $request->validate([
            'nim' => ['required'],
            'nama' => ['required'],
            'angkatan' => ['required'],
            'prodi' => ['required'],
        ]);

        Mahasiswa::create([
            'nim' => $request -> nim, 
            'nama' => $request -> nama, 
            'angkatan' => $request -> angkatan, 
            'prodi' => $request -> prodi, 
        ]);

        return redirect('/melihatMahasiswa');



    }
}
