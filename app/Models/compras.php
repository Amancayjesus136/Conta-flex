<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compras extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $fillable = [
        'cod_compra',
        'tipo_cambio',
        'fecha_comprobante',
        'ruc',
        'nombre_proveedor',
        'documento',
        'factura_numero',
        'fecha_emision',
        'fecha_compra',
        'consulta',
        'base_disponible',
        'IGV',
        'total',
    ];
}

