<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laporan')->insert([
            [
                'id_kasus'      => 1,               // contoh kasus
                'id_user'       => 1,               // petugas/admin yg menangani
                'id_pelapor'    => 1,               // pelapor dari tabel pelapor
                'file_bukti'    => 'bukti1.jpg',    // contoh nama file
                'deskripsi'     => 'Terjadi bullying di lapangan sekolah.',
                'lokasi'        => 'Lapangan Utama',
                'tanggal_waktu' => now(),
                'status'        => 'menunggu',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id_kasus'      => 2,
                'id_user'       => 1,
                'id_pelapor'    => 2,
                'file_bukti'    => 'bukti2.png',
                'deskripsi'     => 'Kejadian perkelahian ringan di kantin.',
                'lokasi'        => 'Kantin',
                'tanggal_waktu' => now()->subDay(),
                'status'        => 'diproses',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
