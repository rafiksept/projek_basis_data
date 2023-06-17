<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cpl_trkb', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Matkul');
            $table->string('Mata_Kuliah');
            $table->string('S1');
            $table->string('S2');
            $table->string('S3');
            $table->string('S4');
            $table->string('S5');
            $table->string('S6');
            $table->string('S7');
            $table->string('S8');
            $table->string('S9');
            $table->string('S10');
            $table->string('S11');
            $table->string('KU1');
            $table->string('KU2');
            $table->string('KU3');
            $table->string('KU4');
            $table->string('KU5');
            $table->string('KU6');
            $table->string('KU7');
            $table->string('KU8');
            $table->string('KU9');
            $table->string('P1');
            $table->string('P2');
            $table->string('P3');
            $table->string('P4');
            $table->string('P5');
            $table->string('P6');
            $table->string('KK1');
            $table->string('KK2');
            $table->string('KK3');
            $table->string('KK4');
            $table->string('KK5');
            $table->timestamps();
        });
    }

    public function down(): void
    {
    }
};
