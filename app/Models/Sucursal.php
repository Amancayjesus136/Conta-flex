<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
    protected $primaryKey = 'id_sucursal';
    public $timestamps = false;

    protected $fillable = ['nombre', 'direccion', 'telefono', 'email', 'hora_apertura', 'hora_cierre', 'activo', 'id_ciudad']; // Agrega los campos que puedes asignar masivamente

    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudad', 'id_ciudad');
    }

    public function jefeSucursal()
    {
        return $this->hasOne('App\Models\JefeSucursal', 'id_sucursal');
    }
}



