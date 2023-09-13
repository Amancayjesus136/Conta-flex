<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $fillable = ['nombre', 'direccion', 'telefono', 'email', 'hora_apertura', 'hora_cierre', 'activo', 'ciudad_id'];

    public function jefe()
    {
        return $this->hasOne(JefeSucursal::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }

}

