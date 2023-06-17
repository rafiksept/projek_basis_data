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
        CREATE TRIGGER update_nilai_prodi
        AFTER UPDATE ON nilais
        FOR EACH ROW
        BEGIN
            IF OLD.prodi = "TSD" THEN 
                BEGIN
                    UPDATE basdut_nilai_tsd SET Kode_Matkul = NEW.kode_matkul WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_tsd SET NIM = NEW.NIM WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_tsd SET Nilai = NEW.Nilai WHERE nilai_id = OLD.id;
                END;
            ELSEIF OLD.prodi = "RN" THEN 
                BEGIN
                    UPDATE basdut_nilai_rn SET Kode_Matkul = NEW.kode_matkul WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_rn SET NIM = NEW.NIM WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_rn SET Nilai = NEW.Nilai WHERE nilai_id = OLD.id;
                END;
            ELSEIF OLD.prodi = "TRKB" THEN 
                BEGIN
                    UPDATE basdut_nilai_trkb SET Kode_Matkul = NEW.kode_matkul WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_trkb SET NIM = NEW.NIM WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_trkb SET Nilai = NEW.Nilai WHERE nilai_id = OLD.id;
                END;
            ELSEIF OLD.prodi = "TE" THEN 
                BEGIN
                    UPDATE basdut_nilai_te SET Kode_Matkul = NEW.kode_matkul WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_te SET NIM = NEW.NIM WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_te SET Nilai = NEW.Nilai WHERE nilai_id = OLD.id;
                END;
            ELSEIF OLD.prodi = "TI" THEN 
                BEGIN
                    UPDATE basdut_nilai_ti SET Kode_Matkul = NEW.kode_matkul WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_ti SET NIM = NEW.NIM WHERE nilai_id = OLD.id;
                    UPDATE basdut_nilai_ti SET Nilai = NEW.Nilai WHERE nilai_id = OLD.id;
                END;
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
