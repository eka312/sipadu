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
    
    // public function laptop()
    // {
    //     return $this->belongsTo(laptop::class, 'id_laptop', 'id_laptop');
    // }

    // public function suplayer()
    // {
    //     return $this->belongsTo(suplayer::class, 'id_suplayer', 'id_suplayer');
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
