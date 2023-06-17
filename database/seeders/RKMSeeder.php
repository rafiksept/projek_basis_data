<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa_to_kelas_matkuls')->insert([
            'mahasiswa_ftmm_id' => 1,
            'kelas_matkul_id' => 1
        ]);
    }
}
