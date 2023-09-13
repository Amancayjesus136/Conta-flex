<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dni extends Model
{
    protected $table = 'dnis'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'numero',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'documento',
        // ... otras propiedades
    ];

    // ... otras relaciones y métodos
}
