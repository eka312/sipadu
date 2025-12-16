<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        
        $mapel = Mapel::where('nama_mapel', $row['mapel'])->first();

        return new Guru([
            
            'nama_guru'    => $row['nama_guru'],
            'id_mapel'     => $mapel ? $mapel->id_mapel : null,
            'email'        => $row['email'],
            'no_identitas' => $row['no_identitas'],
            'password'     => Hash::make($row['password']),
            
        ]);
    }
}
