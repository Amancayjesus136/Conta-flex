<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function showUserActivity($userId)
    {
        // Obtener el usuario por su ID
        $user = User::find($userId);

        // Verificar si se encontró el usuario
        if (!$user) {
            abort(404); // O muestra una vista de "usuario no encontrado"
        }

        // Obtener todas las actividades relacionadas con ese usuario
        $activityLogs = Activity::causedBy($user)->get();

        // Verificar si hay registros de actividad antes de pasarlos a la vista
        if ($activityLogs->isEmpty()) {
            // No hay registros de actividad para este usuario, muestra un mensaje o redirecciona a una vista de "sin actividad"
            // Por ejemplo:
            return view('sin-actividad', compact('user'));
        }

        return view('activity-log', compact('user', 'activityLogs'));
    }
}
