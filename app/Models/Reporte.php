<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'reportes';
    protected $primaryKey = 'id';
    public $timestamps = true; // Desactiva las marcas de tiempo

    protected $fillable = ['id_jefe', 'reporte']; // Agrega 'reporte' a la lista de campos asignables

    // Define la relación con el jefe
    public function jefe()
    {
        return $this->belongsTo('App\Models\JefeSucursal', 'id_jefe');
    }

    // Resto de tus propiedades y métodos del modelo
}
