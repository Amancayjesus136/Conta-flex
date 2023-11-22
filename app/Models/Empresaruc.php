<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresaruc extends Model
{
    use HasFactory;
    protected $table = 'empresaruc'; 

    protected $fillable = [
        'ruc',
        'nombre',
    ];

}
