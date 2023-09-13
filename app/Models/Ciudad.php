<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';
    protected $primaryKey = 'id_ciudad';
    public $timestamps = false;
    
    protected $fillable = ['nombre_ciudad', 'nombre_pais']; // Agrega los campos que puedes asignar masivamente

    public function sucursales()
    {
        return $this->hasMany('App\Models\Sucursal', 'id_ciudad');
    }
}
