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
            CREATE TRIGGER insert_nilai AFTER INSERT ON mahasiswa_to_kelas_matkuls
            FOR EACH ROW
            BEGIN
                INSERT INTO nilais (mahasiswa_id,kelas_matkul_id, nilai) VALUES (NEW.mahasiswa_id, NEW.kelas_matkul_id,0);
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insert_nilai_trigger');
    }
};
