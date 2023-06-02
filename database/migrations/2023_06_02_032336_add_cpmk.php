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
        Schema::create('cpmks', function (Blueprint $table) {
            $table->id();
            $table -> string('kode_cpmk');
            $table -> integer('bobot_cpmk');
            $table -> boolean('aktif');
            $table -> foreignId('mata_kuliah_id') -> constrained() -> onDelete('cascade');
            $table -> foreignId('cpl_id') -> constrained() -> onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
