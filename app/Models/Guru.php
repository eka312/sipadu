<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $guarded = [];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id_mapel');
    }

    
    
    // public function guru()
    // {
    //     return $this->belongsTo(guru::class, 'id_guru', 'id_guru');
    // }

    // public function pelapor()
    // {
    //     return $this->belongsTo(pelapor::class, 'id_pelapor', 'id_pelapor');
    // }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($projek) {
    //         $projek->slug = Str::slug($projek->judul);
    //     });

    //     static::updating(function ($projek) {
    //         $projek->slug = Str::slug($projek->judul);
    //     });
    // }

    
}
