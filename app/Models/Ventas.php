<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable = [
        'cod_compra',
        'tipo_cambio',
        'fecha_comprobante',
        'ruc',
        'nombre_proveedor',
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

