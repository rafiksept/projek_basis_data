<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GantiPassword extends Controller
{
    public function updatePassword(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
        ]);

        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Memeriksa apakah user ada atau tidak
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Memeriksa kecocokan password lama
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai.');
        }

        // Mengubah password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Mengembalikan respons dengan pesan sukses
        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }
}
