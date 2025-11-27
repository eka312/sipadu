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
                'id_kelas' => 1,
                'nis' => '12124',
                'nama_siswa' => 'Budi Santoso',
                'tanggal_lahir' => '2007-05-12',
                'password' => Hash::make('20070512'),
            ],
            [
                'id_kelas' => 1,
                'nis' => '12125',
                'nama_siswa' => 'Ani Lestari',
                'tanggal_lahir' => '2008-01-23',
                'password' => Hash::make('20080123'),
            ],
        ]);
    }
}
