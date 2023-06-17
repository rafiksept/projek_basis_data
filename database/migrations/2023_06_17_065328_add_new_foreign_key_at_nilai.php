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
            $table->unsignedBigInteger('mahasiswa_ftmm_id');
            $table->foreign('mahasiswa_ftmm_id')->references('id')->on('mahasiswa_ftmm');
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
