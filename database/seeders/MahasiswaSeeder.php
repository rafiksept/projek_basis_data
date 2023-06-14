<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            'nim' => "162112133035",
            'nama'=> "Lopi ketiduran",
            'angkatan' => "2021",
            'prodi' => "TSD"
            
        ]);
    }
}
