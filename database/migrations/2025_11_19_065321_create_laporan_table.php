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
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('id_laporan');
            $table->integer('id_kasus')->nullable();
            $table->integer('id_user')->nullable();
            $table->integer('id_pelapor')->nullable();
            $table->longText('file_bukti');
            $table->longText('deskripsi');
            $table->string('lokasi');
            $table->dateTime('tanggal_waktu');
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
