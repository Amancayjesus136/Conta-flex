<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignarUsuario extends Model
{
    protected $table = 'asignar_usuario'; 

    protected $fillable = [
        'usuario',
        'empresa',
    ];

    // Modelo AsignarUsuario
public function user()
{
    return $this->belongsTo(User::class, 'usuario');
}

public function empresa()
{
    return $this->belongsTo(Empresa::class, 'empresa');
}


}
