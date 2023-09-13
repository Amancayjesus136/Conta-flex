<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPlaca extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'tarjeta',
        'fecha',
        'serie',
        'marca',
        'titulo_Anio',
        'titulo_nro',
        'tipo_propietario',
        'modelo',
        'combustible',
        'carroceria',
        'motor',
        'anio',
        'clase',
        'color',
        'cilindros',
        'asientos',
        'longitud',
        'ancho',
        'altura',
        'peso_bruto',
        'estado',
        // Agrega aquí otros campos que desees llenar masivamente (mass assignment)
    ];

    public function placa()
    {
        return $this->belongsTo(Placa::class);
    }
}
