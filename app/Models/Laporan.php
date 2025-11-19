<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    protected $guarded = [];

    public function kasus()
    {
        return $this->belongsTo(Kasus::class, 'id_kasus', 'id_kasus');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pelapor()
    {
        return $this->belongsTo(Pelapor::class, 'id_pelapor', 'id_pelapor');
    }
}
