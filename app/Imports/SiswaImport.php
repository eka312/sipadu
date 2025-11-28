<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'id_kelas'      => $row[0],
            'nama_siswa'    => $row[1],
            'nis'           => $row[2],
            'tanggal_lahir' => $row[3],
            'password'      => $row[4],
        ]);
    }
}
