<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCambio extends Model
{
    use HasFactory;
    protected $table = 'tipo_cambio'; 

    protected $fillable = [
        'moneda',
        'IGV',
        'dia',
        'tipo_compra',
        'tipo_venta',
        'fecha_creacion',
    ];
}
