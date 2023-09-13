<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Placa;
use App\Models\ActivityLogGeneral;
use Illuminate\Support\Facades\View;

class ListadoController extends Controller
{
    public function __construct()
    {
        // Registra la actividad en la tabla 'activity_log_generals' al acceder a la vista de listado de consultas
        View::composer('listado_db.index', function ($view) {
            app(ActivityLogGeneralController::class)->logActivity('Accedió a la vista de listado de consultas', 'Abrió la vista de listado de consultas');
        });
    }

    public function index()
    {
        $usuarios = Usuario::with('placa')->get();
        return view('listado_db.index', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('listado_db.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('listado_db.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        if ($usuario->placa) {
            $placa = $usuario->placa;
            $placa->update($request->all());
        } else {
            $placa = new Placa($request->all());
            $usuario->placa()->save($placa);
        }

        // Registrar la actividad en la tabla 'activity_log_generals' para la actualización de usuario y placa
        app(ActivityLogGeneralController::class)->logActivity('Actualizó usuario y placa', 'Realizó una actualización de usuario y placa');

        return redirect()->route('listado_db.index')->with('success', 'Usuario y Placa actualizados correctamente');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        // Registrar la actividad en la tabla 'activity_log_generals' para la eliminación de usuario y placa
        app(ActivityLogGeneralController::class)->logActivity('Eliminó usuario y placa', 'Realizó una eliminación de usuario y placa');

        return redirect()->route('listado_db.index')->with('success', 'Usuario y Placa eliminados correctamente');
    }
}
