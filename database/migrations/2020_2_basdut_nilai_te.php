<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('basdut_nilai_te', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Matkul');
            $table->string('NIM');
            $table->integer('Nilai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
    }
};
