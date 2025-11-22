<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'nis' => '1234567890',
                'nama_siswa' => 'Budi Santoso',
                'tanggal_lahir' => '2007-05-12',
                'password' => Hash::make('password123'),
            ],
            [
                'nis' => '0987654321',
                'nama_siswa' => 'Ani Lestari',
                'tanggal_lahir' => '2008-01-23',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
