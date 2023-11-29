<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    use HasFactory;
    protected $table = 'totales'; 

    protected $fillable = [
        'total1',
        'total2',
        'total3',
    
    ];
}
