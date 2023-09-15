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

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

}
