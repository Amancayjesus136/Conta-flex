<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'propietario',
        'descripcion',
        'tipo_documento',
        'documento'
        // Agrega aquí otros campos que desees llenar masivamente (mass assignment)
    ];

    public $timestamps = true;

    public function placa()
    {
        return $this->belongsTo(Placa::class);
    }

}
