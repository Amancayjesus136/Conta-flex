<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ventas;
use App\Exports\VentasExport;
use Maatwebsite\Excel\Facades\Excel;

class ReporteVentasController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reporteventas = ventas::query();

        if (!empty($request->get('s'))) {
            $term = $request->get('s');
            $reporteventas = $reporteventas->where(function ($query) use ($term) {
                $query->where('cod_venta', 'LIKE', "%$term%")
                    ->orWhere('tipo_cambio', 'LIKE', "%$term%")
                    ->orWhere('fecha_comprobante', 'LIKE', "%$term%")
                    ->orWhere('ruc', 'LIKE', "%$term%")
                    ->orWhere('nombre_proveedor', 'LIKE', "%$term%")
                    ->orWhere('documento', 'LIKE', "%$term%")
                    ->orWhere('factura_numero', 'LIKE', "%$term%")
                    ->orWhere('fecha_emision', 'LIKE', "%$term%")
                    ->orWhere('fecha_venta', 'LIKE', "%$term%")
                    ->orWhere('base_disponible', 'LIKE', "%$term%")
                    ->orWhere('IGV', 'LIKE', "%$term%")
                    ->orWhere('total', 'LIKE', "%$term%")
                    ->orWhere('tasa_IGV', 'LIKE', "%$term%");
            });
        }

        $reporteventas = $reporteventas->paginate(7);

        if ($request->has('export')) {
            return Excel::download(new VentasExport, 'ventas.xlsx');
        }

        return view('reporte_ventas.index', compact('reporteventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ventas::create($request->all());
        return redirect()->back()->with('success', 'actualizado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reporteventa = ventas::findOrFail($id);
        return redirect()->back()->with('success', 'actualizado exitosamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reporteventas = ventas::findOrFail($id);
        $reporteventas->update($request->all());
        return redirect()->back()->with('success', 'actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reporteventas = ventas::findOrFail($id);
        $reporteventas->delete();
        return redirect()->back()->with('success', 'actualizado exitosamente');
    }
}
