<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa'; 

    protected $fillable = [
        'compania',
        'nombre_empresa',
        'plan_cuentas',
    ];

}
