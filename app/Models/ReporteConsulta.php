<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteConsulta extends Model
{
    use HasFactory;

    protected $table = 'reportes_consultas';

    protected $fillable = [
        'usuario_id',
        'descripcion',
    ];


    public function usuario()
     {
       return $this->belongsTo(Usuario::class, 'usuario_id');
     }
}
