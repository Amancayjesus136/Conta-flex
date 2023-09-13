<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReporteConsulta;
use App\Models\Usuario;
use App\Models\ActivityLogGeneral;

class ReporteConsultaController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('reportesconsu.index', compact('usuarios'));
    }

    public function mostrarFormulario(Request $request)
    {
        $usuarioId = $request->input('usuario_id');
        $usuario = Usuario::findOrFail($usuarioId);
        return view('reportesconsu.formulario', compact('usuario'));
    }

    public function guardarReporte(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer',
            'descripcion' => 'required|string|max:255',
        ]);

        $reporteConsulta = new ReporteConsulta();
        $reporteConsulta->usuario_id = $request->input('usuario_id');
        $reporteConsulta->descripcion = $request->input('descripcion');
        $reporteConsulta->save();

        // Registrar la actividad en la tabla 'activity_log_generals' para la creación de un reporte
        app(ActivityLogGeneralController::class)->logActivity('Creó un reporte de consulta', 'Generó un reporte en la vista de Reportes de Consultas');

        return redirect()->route('reportesconsu.index')->with('success', 'Reporte generado y registrado exitosamente.');
    }
}
