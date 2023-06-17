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
        Schema::create('cpmks_trkb', function (Blueprint $table) {
            $table->string('mata_kuliah');
            $table->integer('s1');
            $table->integer('s2');
            $table->integer('s3');
            $table->integer('s4');
            $table->integer('s5');
            $table->integer('s6');
            $table->integer('s7');
            $table->integer('s8');
            $table->integer('s9');
            $table->integer('s10');
            $table->integer('s11');
            $table->integer('ku1');
            $table->integer('ku2');
            $table->integer('ku3');
            $table->integer('ku4');
            $table->integer('ku5');
            $table->integer('ku6');
            $table->integer('ku7');
            $table->integer('ku8');
            $table->integer('ku9');
            $table->integer('p1');
            $table->integer('p2');
            $table->integer('p3');
            $table->integer('p4');
            $table->integer('p5');
            $table->integer('p6');
            $table->integer('kk1');
            $table->integer('kk2');
            $table->integer('kk3');
            $table->integer('kk4');
            $table->integer('kk5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpmks_trkb');
    }
};
