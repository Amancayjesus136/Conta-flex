<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placa extends Model
{
    protected $table = 'placas'; // Nombre de la tabla en la base de datos

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

    public $timestamps = true;


    // Relación inversa de "Placa" a "Usuario"
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'placa_id', 'id');
    }
}
