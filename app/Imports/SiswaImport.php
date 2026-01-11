<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Siswa([
            'nama_siswa'    => $row['nama_siswa'],
            'nis'           => $row['nis'],
            'kelas'         => $row['kelas'], 
            'tanggal_lahir' => Date::excelToDateTimeObject($row['tanggal_lahir'])->format('Y-m-d'),
            'password'      => Hash::make($row['password']),
            'status'       => 'nonaktif', 
        ]);
    }
}
