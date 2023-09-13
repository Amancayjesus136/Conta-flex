<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignarUsuario extends Model
{
    protected $table = 'asignar_usuario'; 

    protected $fillable = [
        'usuario',
        'empresa',
    ];

}
