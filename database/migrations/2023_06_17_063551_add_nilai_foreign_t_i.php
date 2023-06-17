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
        Schema::table('basdut_nilai_ti', function (Blueprint $table) {
            $table->unsignedBigInteger('nilai_id');
            $table->foreign('nilai_id')->references('id')->on('nilais');
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
