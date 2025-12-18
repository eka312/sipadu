<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->integer('id_guru')->nullable()->after('id_user');
            $table->integer('id_siswa')->nullable()->after('id_guru');

            $table->dropColumn('id_pelapor');
        });
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropColumn(['id_guru', 'id_siswa']);
            $table->integer('id_pelapor')->nullable();
        });
    }
};
