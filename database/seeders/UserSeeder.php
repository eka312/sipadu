<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'email' => 'admin@sipadu.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // ganti sesuai kebutuhan
                'nama_petugas' => 'Administrator',
                'jabatan' => 'Admin',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
