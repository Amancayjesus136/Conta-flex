<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JefeSucursal extends Model
{
    protected $table = 'jefe_sucursal';
    protected $primaryKey = 'id_jefe';
    public $timestamps = false;

    public function sucursal()
    {
        return $this->belongsTo('App\Models\Sucursal', 'id_jefe'); // Corregir a 'id_jefe'
    }
}


