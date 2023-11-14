<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogRuc extends Model
{
    protected $table = 'logs_ruc'; // Esto establecerá el nombre de la tabla correctamente

    protected $fillable = ['user_id', 'accion'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
