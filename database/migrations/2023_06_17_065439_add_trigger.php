<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER insert_nilai_baru AFTER INSERT ON mahasiswa_to_kelas_matkuls
            FOR EACH ROW
            BEGIN
                INSERT INTO nilais (mahasiswa_ftmm_id,kelas_matkul_id, nilai, NIM, kode_matkul, prodi) VALUES (NEW.mahasiswa_ftmm_id, NEW.kelas_matkul_id,0,"tidak ada", "tidak ada",NEW.prodi);
            END;


           
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
