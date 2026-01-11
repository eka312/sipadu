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
        Schema::table('guru_and_siswa_tables', function (Blueprint $table) {
            Schema::table('guru', function (Blueprint $table) {
                $table->rememberToken()->nullable();
            });
    
            Schema::table('siswa', function (Blueprint $table) {
                $table->rememberToken()->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guru_and_siswa_tables', function (Blueprint $table) {
            Schema::table('guru', function (Blueprint $table) {
                $table->rememberToken()->nullable();
            });
    
            Schema::table('siswa', function (Blueprint $table) {
                $table->rememberToken()->nullable();
            });
        });
    }
};
