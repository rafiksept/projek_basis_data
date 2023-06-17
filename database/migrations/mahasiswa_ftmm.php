<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mahasiswa_ftmm', function (Blueprint $table) {
            $table->id();
            $table->string('NIM');
            $table->string('Nama');
            $table->string('Angkatan');
            $table->string('Jurusan');
            $table->string('Inisial');
            $table->timestamps();
        });
    }

    public function down(): void
    {
    }
};
