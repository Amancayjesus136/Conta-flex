<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculoPlacas extends Model
{
    protected $table = 'vehiculos';

    protected $fillable = [
        'Fecha', 'Placa', 'Direccion', 'Hora_Entrada', 'Hora_Salida', 'Total_Horas',
        'AB', 'Tipo', 'Tipo_Porcentaje', 'IZQ', 'DER', 'Probabilidad'
    ];
}
