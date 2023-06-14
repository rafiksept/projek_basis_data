<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelationshipKelasMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa_to_kelas_matkuls')->insert([
            'mahasiswa_id' => 1,
            'kelas_matkul_id' => 1
        ]);
    }
}
