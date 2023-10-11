<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaIGV extends Model
{
    use HasFactory;
    protected $table = 'pruebas_igv'; 

    protected $fillable = [
        'igv',
    ];

}
