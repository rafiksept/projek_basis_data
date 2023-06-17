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
        Schema::table('nilais', function (Blueprint $table) {
            $table->dropForeign(["mahasiswa_id"]);
            $table->dropColumn(["mahasiswa_id"]);
            // $table->string("kode_matkul");
            // $table->string("prodi");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
