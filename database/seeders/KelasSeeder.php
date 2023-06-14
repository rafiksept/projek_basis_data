<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas_matkuls')->insert([
            'nama' => "Statistika Matematika SD-A2",
            'mata_kuliah_id' => 1,
            'prodi' => "TSD"
        ]);
    }
}
