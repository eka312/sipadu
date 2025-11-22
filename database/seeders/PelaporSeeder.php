<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelapor')->insert([
            [
                'id_siswa' => 1,
                'id_guru' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_siswa' => null,
                'id_guru' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
