<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\JefeSucursal;


class ReporteController extends Controller
{
    public function index()
{
    // Registrar la actividad en el controlador ActivityLogGeneralController
    app(ActivityLogGeneralController::class)->logActivity('Acceso a la Vista de Reportes', 'Un usuario accedió a la vista de reportes.');

    $reportes = Reporte::orderBy('id_reporte', 'desc')->get();
    return view('reporte_jefesucu.index', compact('reportes'));
}

    public function create($id_jefe)
    {
        return view('reporte_jefesucu.create', compact('id_jefe'));
    }

    public function store(Request $request, $id_jefe)
{
    $reporte = new Reporte();
    $reporte->id_jefe = $id_jefe;
    $reporte->reporte = $request->input('reporte');
    $reporte->save();

    //Registrar la actividad en el controlador ActivityLogGeneralController
    app(ActivityLogGeneralController::class)->logActivity('Creación de Reporte', 'Se creó un nuevo reporte para el jefe con ID: ' . $id_jefe);


    // Retorna la vista de confirmación dentro de la carpeta reporte_jefesucu
    return view('reporte_jefesucu.comfirmacion');
}


}
