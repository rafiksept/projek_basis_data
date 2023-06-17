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
        CREATE TRIGGER insert_nilai_to_prodi AFTER INSERT ON nilais
        FOR EACH ROW
        BEGIN
            IF NEW.prodi = "TSD" THEN 
                INSERT INTO basdut_nilai_tsd(Kode_Matkul, NIM, Nilai, nilai_id) VALUES (NEW.kode_matkul, NEW.NIM, 0, NEW.id);
            ELSEIF NEW.prodi = "RN" THEN 
                INSERT INTO basdut_nilai_rn(Kode_Matkul, NIM, Nilai, nilai_id) VALUES (NEW.kode_matkul, NEW.NIM, 0, NEW.id);
            ELSEIF NEW.prodi = "TRKB" THEN 
                INSERT INTO basdut_nilai_trkb(Kode_Matkul, NIM, Nilai, nilai_id) VALUES (NEW.kode_matkul, NEW.NIM, 0, NEW.id);
            ELSEIF NEW.prodi = "TE" THEN 
                INSERT INTO basdut_nilai_te(Kode_Matkul, NIM, Nilai, nilai_id) VALUES (NEW.kode_matkul, NEW.NIM, 0, NEW.id);
            ELSEIF NEW.prodi = "TI" THEN 
                INSERT INTO basdut_nilai_ti(Kode_Matkul, NIM, Nilai, nilai_id) VALUES (NEW.kode_matkul, NEW.NIM, 0, NEW.id);
            END IF;
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
