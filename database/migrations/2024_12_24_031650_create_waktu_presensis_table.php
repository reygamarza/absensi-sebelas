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
        Schema::create('waktu_presensis', function (Blueprint $table) {
            $table->increments('id_waktu_presensi');
            $table->time('presensi_masuk');
            $table->time('batas_presensi_masuk');
            $table->time('presensi_pulang');
            $table->time('batas_presensi_pulang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waktu_presensis');
    }
};
