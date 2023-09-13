<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DniConsultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nombres', 'apellido_paterno', 'apellido_materno', 'numero_documento',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Asegúrate de tener la relación correcta con el modelo User
    }
}
