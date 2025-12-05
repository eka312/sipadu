<?php

namespace App\Imports;

use App\Models\Siswa;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class SiswaImport implements ToModel,WithStartRow
{

    public function startRow(): int
    {
        return 2;
    }
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
            'tanggal_lahir' => Date::excelToDateTimeObject($row[3])->format('Y-m-d'),
            'password'      => bcrypt($row[4]),
        ]);
    }
}
