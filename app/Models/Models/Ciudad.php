<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = ['nombre', 'pais'];

    public function sucursales()
    {
        return $this->hasMany(Sucursal::class);
    }
}
