<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLogGeneral extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = ['user_id', 'accion', 'vista', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
