<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Mengambil input gambar dari pengguna
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('users'), $filename);

            // Menghapus gambar lama jika ada
            if ($user->image && file_exists(public_path('users/' . $user->image))) {
                unlink(public_path('users/' . $user->image));
            }

            // Menyimpan nama gambar baru ke database
            $user->image = $filename;
        }

        // Mengambil input nama, username, peran, prodi, dan NIK dari pengguna
        $name = $request->input('name');
        if ($name) {
            $user->name = $name;
        }
        $nik = $request->input('nik');
        if ($nik) {
            $user->nik = $nik;
        }
        $peran = $request->input('peran');
        $prodi = $request->input('prodi');

        // Inisialisasi nilai default role_id
        $role_id = null;

        if ($peran == 'pjmk' && $prodi == 'tsd') {
            $role_id = 1;
        } elseif ($peran == 'pjmk' && $prodi == 'rn') {
            $role_id = 2;
        } elseif ($peran == 'pjmk' && $prodi == 'te') {
            $role_id = 3;
        } elseif ($peran == 'pjmk' && $prodi == 'ti') {
            $role_id = 4;
        } elseif ($peran == 'pjmk' && $prodi == 'trkb') {
            $role_id = 5;
        } elseif ($peran == 'admin') {
            $role_id = 6;
        } 

        // Pastikan role_id telah ditemukan
        if ($role_id !== null) {
            // Mengubah role_id pada user
            $user->role_id = $role_id;
        }

        // Menyimpan perubahan pada database
        if ($user->save()) {
            // Menyimpan waktu terkini
            $currentTime = Carbon::now();
    
            // Menghitung selisih waktu pembaruan profil
            $updatedTime = $currentTime->diffForHumans($user->updated_at, ['parts' => 2, 'join' => true]);
    
            // Menyimpan notifikasi pada session
            Session::flash('profile_updated', [
                'message' => 'Profile changed',
                'time' => $updatedTime,
            ]);
    
            return redirect()->back()->with('success');
        }  else {
            // Kode yang akan dieksekusi jika perubahan gagal dilakukan
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }
}
