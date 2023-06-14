<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class InputNilaiController extends Controller
{
    
    public function inputNilai(){
        return view('inputNilai');
    }

    public function getMatkul($prodi){
        $matkul = DB::table('mata_kuliahs') -> where('prodi', $prodi) -> get();

        return Response::json($matkul);
    }

    public function getMahasiswa($matkul){
        $kelas = DB::table('kelas_matkuls')  -> where('mata_kuliah_id', $matkul) -> get();
        
        $resultKelas = collect(json_decode($kelas))->pluck('id')->all();
        $relasiKelas = DB::table('mahasiswa_to_kelas_matkuls') -> whereIn('kelas_matkul_id', $resultKelas)  -> get();
        $resultMahasiswa = collect(json_decode($relasiKelas))->pluck('id')->all();

        $mahasiswa = DB::table('mahasiswas') -> whereIn('id', $resultMahasiswa) -> get();
        return Response::json($mahasiswa);

    }

    public function inputNilaiMahasiswa(Request $request){
        // 1. buatlah validate data, cuman validate data yang banyak input buat cuma satu attribute


        // 2. Buatlah insert data nilai apabila disubmit dari ui. UI nya ga ush diapa apain, udah aku sesuai buat kalian. 
        // kalian cuma fokus ke sini. itukan nilainya banyak ya barti insert ke tabelnya pake perulangan.

        // udah gitu aja semangat


        return redirect('/inputNilai');
    }

}
