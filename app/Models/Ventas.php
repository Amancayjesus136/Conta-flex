<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    protected $table = 'ventas';

    protected $fillable = [
        'cod_venta',
        'tipo_cambio',
        'fecha_comprobante',
        'ruc',
        'nombre',
        'documento',
        'factura_numero',
        'fecha_emision',
        'fecha_venta',
        'base_disponible',
        'IGV',
        'total',
        'tasa_IGV',
    ];
}
