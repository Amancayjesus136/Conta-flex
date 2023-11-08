<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions; // Asegúrate de importar la clase LogOptions


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity, HasRoles;
    

    protected static $logAttributes = ['*'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getActivitylogOptions(): LogOptions // Cambia la declaración del método
    {
        return LogOptions::defaults()
            ->logName('user_activities')
            ->logDescription('Registro de actividades de usuarios');
        // Puedes agregar más opciones de configuración aquí
        if ($usuario) {
            // Obtén los roles del usuario
            $rolesUsuario = $usuario->getRoleNames();
    
            // Verificar si el usuario tiene uno de los roles válidos
            if ($rolesUsuario->contains('superadministrador') || $rolesUsuario->contains('admin') || $rolesUsuario->contains('jefesucursal') || $rolesUsuario->contains('operador')) {
                // Usuario tiene un rol válido
                $request->authenticate();
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                // Usuario no tiene un rol válido
                return back()->with('error', 'No tienes permiso para acceder al administrador.<br><a href="/panel/login">Ingresa al panel de usuarios</a>');
            }
        } else {
            // Usuario no encontrado
            return back()->with('error', 'Usuario no encontrado');
        }
    }
    public function activityLogs()
    {
        return $this->hasMany(ActivityLogGeneral::class, 'user_id');
    }

    public function asignaciones()
    {
        return $this->hasMany(AsignarUsuario::class, 'usuario_id');
    }
}

