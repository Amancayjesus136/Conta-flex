<?php

namespace App\Http\Controllers;

use App\Models\ReporteConsulta;
use Illuminate\Http\Request;
use App\Models\ActivityLogGeneral;

class ListadoReportesController extends Controller
{
    public function index()
    {
        // Registrar la actividad en la tabla 'activity_log_generals' para ver el listado de reportes
        app(ActivityLogGeneralController::class)->logActivity('Ver listado de reportes', 'Visualizó el listado de reportes en la vista Listado de Reportes');

        $reportes = ReporteConsulta::all();
        return view('listadoreportes.index', compact('reportes'));
    }
}
