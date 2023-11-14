<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TazaIgv extends Model
{
    use HasFactory;
    protected $table = 'taza_igv'; 

    protected $fillable = [
        'igv',
    ];
}
