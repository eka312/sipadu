<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guru')->insert([
            [
                
                'nama_guru' => 'Pak Andi Wijaya',
                'email' => 'andi@guru.com',
                'password' => Hash::make('password123'),
                'no_identitas' => 'G-2023-001',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nama_guru' => 'Bu Siti Rahma',
                'email' => 'siti@guru.com',
                'password' => Hash::make('password123'),
                'no_identitas' => 'G-2023-002',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        


        
    }
}
