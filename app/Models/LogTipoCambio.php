<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTipoCambio extends Model
{
    use HasFactory;
    protected $table = 'log_tipo_cambio'; 

    protected $fillable = [
        'fecha',
        'moneda_origen',
        'moneda_destino',
        'tipo_cambio',
        'fuente',
    ];
}
