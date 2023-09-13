<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoEntradaSalida extends Model
{
    use HasFactory;

    protected $table = 'vehiculos_entrada_salida';

    protected $fillable = [
        'Fecha',
        'Placa',
        'Direccion',
        'Hora_Entrada',
        'Hora_Salida',
        'Total_Horas',
        'AB',
        'Tipo',
        'Tipo_Porcentaje',
        'IZQ',
        'DER',
        'Probabilidad',
    ];

    // Si tienes relaciones, como relaciones con otras tablas, puedes definirlas aquí
}
