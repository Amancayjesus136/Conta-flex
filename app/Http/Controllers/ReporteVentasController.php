<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ventas;

class ReporteVentasController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reporteventas = ventas::query();
        if (!empty($_GET['s'])) {
            $reporteventas = $reporteventas->where('cod_venta', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('tipo_cambio', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('fecha_comprobante', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('ruc', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('nombre_proveedor', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('documento', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('factura_numero', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('fecha_emision', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('fecha_venta', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('base_disponible', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('IGV', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('total', 'LIKE', '%'.$_GET['s'].'%')
                            ->orWhere('tasa_IGV', 'LIKE', '%'.$_GET['s'].'%');
          }
          $reporteventas = $reporteventas->get();
        return view ('reporte_ventas.index', compact('reporteventas'));
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
