<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kasus')->insert([
            [
                'jenis_kasus' => 'Bullying',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_kasus' => 'Kekerasan Fisik',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_kasus' => 'Kekerasan Verbal',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_kasus' => 'Perundungan Online (Cyberbullying)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_kasus' => 'Pelanggaran Tata Tertib',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
