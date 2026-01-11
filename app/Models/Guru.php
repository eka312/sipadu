<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Guru extends Authenticatable
{
    use Notifiable;
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $guarded = [];


    
    
   
    
}


