<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Guru([
            'nama_guru'    => $row['nama_guru'],
            'email'        => $row['email'],
            'no_identitas' => $row['no_identitas'],
            'password'     => Hash::make($row['password']),
            'status'       => 'nonaktif', 
        ]);
    }
}
