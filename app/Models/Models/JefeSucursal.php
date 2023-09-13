<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JefeSucursal extends Model
{
    protected $fillable = ['nombre', 'sucursal_id'];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}
