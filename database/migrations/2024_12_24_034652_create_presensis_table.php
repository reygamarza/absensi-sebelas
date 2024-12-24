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
        Schema::create('presensis', function (Blueprint $table) {
            $table->increments('id_presensi');
            $table->string('nis', 17);
            $table->foreign('nis')->references('nis')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['Hadir', 'Sakit', 'Izin', 'Alfa', 'Terlambat', 'TAP'])->default('Alfa');
            $table->string('foto_masuk')->nullable();
            $table->string('foto_pulang')->nullable();
            $table->text('keterangan')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->string('koordinat_masuk')->nullable();
            $table->string('koordinat_pulang')->nullable();
            $table->integer('menit_keterlambatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
