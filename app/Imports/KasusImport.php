<?php

namespace App\Imports;

use App\Models\Kasus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KasusImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kasus([
            'jenis_kasus'     => $row['jenis_kasus'],
        ]);
    }
}
