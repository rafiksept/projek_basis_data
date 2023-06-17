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
        Schema::create('mahasiswa_to_kelas_matkuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_ftmm_id');
            $table->foreign('mahasiswa_ftmm_id')->references('id')->on('mahasiswa_ftmm');
            $table -> foreignId('kelas_matkul_id') -> constrained() -> onDelete('cascade');
            $table->timestamps();
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
