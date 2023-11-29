<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ventas; 
use App\Models\Compras;
use App\Models\Total;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LiquidacionesExport;

class DetallesLiquidacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reporteventas = Ventas::all();
        $reportecompras = Compras::all();
        $sumBase = $reporteventas->sum('base_disponible');
        $sumBase2 = $reportecompras->sum('base_disponible');
        $sumIGV = $reporteventas->sum('IGV');
        $sumIGV2 = $reportecompras->sum('IGV');
        $total1 = Total::latest()->pluck('total1')->first();

        return view('detalles.index', compact('reporteventas', 'reportecompras', 'sumBase', 'sumBase2', 'sumIGV', 'sumIGV2', 'total1'));
    }
}
