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
        Schema::create('c_p_m_k_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Mata_Kuliah');
            $table->decimal('S1', 3, 2)->default(0.00);
            $table->decimal('S2', 3, 2)->default(0.00);
            $table->decimal('S3', 3, 2)->default(0.00);
            $table->decimal('S4', 3, 2)->default(0.00);
            $table->decimal('S5', 3, 2)->default(0.00);
            $table->decimal('S6', 3, 2)->default(0.00);
            $table->decimal('S7', 3, 2)->default(0.00);
            $table->decimal('S8', 3, 2)->default(0.00);
            $table->decimal('S9', 3, 2)->default(0.00);
            $table->decimal('S10', 3, 2)->default(0.00);
            $table->decimal('S11', 3, 2)->default(0.00);
            $table->decimal('KU1', 3, 2)->default(0.00);
            $table->decimal('KU2', 3, 2)->default(0.00);
            $table->decimal('KU3', 3, 2)->default(0.00);
            $table->decimal('KU4', 3, 2)->default(0.00);
            $table->decimal('KU5', 3, 2)->default(0.00);
            $table->decimal('KU6', 3, 2)->default(0.00);
            $table->decimal('KU7', 3, 2)->default(0.00);
            $table->decimal('KU8', 3, 2)->default(0.00);
            $table->decimal('KU9', 3, 2)->default(0.00);
            $table->decimal('P1', 3, 2)->default(0.00);
            $table->decimal('P2', 3, 2)->default(0.00);
            $table->decimal('P3', 3, 2)->default(0.00);
            $table->decimal('P4', 3, 2)->default(0.00);
            $table->decimal('P5', 3, 2)->default(0.00);
            $table->decimal('P6', 3, 2)->default(0.00);
            $table->decimal('P7', 3, 2)->default(0.00);
            $table->decimal('KK1', 3, 2)->default(0.00);
            $table->decimal('KK2', 3, 2)->default(0.00);
            $table->decimal('KK3', 3, 2)->default(0.00);
            $table->decimal('KK4', 3, 2)->default(0.00);
            $table->decimal('KK5', 3, 2)->default(0.00);
            $table->decimal('KK6', 3, 2)->default(0.00);
            $table->decimal('KK7', 3, 2)->default(0.00);
            $table->decimal('KK8', 3, 2)->default(0.00);
            $table->decimal('KK9', 3, 2)->default(0.00);
            $table->decimal('KK10', 3, 2)->default(0.00);
            $table->string('Prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_p_m_k_s');
    }
};
