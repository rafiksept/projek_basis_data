<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliahs')->insert([
            'nama' => "Statistika Matematika",
            'kode_matkul' => "MAS316",
            'semester' => 4,
            'prodi' => "TSD",
            "sks" => 3,
            'user_id'=> 1
            
        ]);
    }
}
