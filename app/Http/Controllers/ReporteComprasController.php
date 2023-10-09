<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\compras;
use App\Exports\ComprasExport;
use Maatwebsite\Excel\Facades\Excel;

class ReporteComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reportecompras = compras::query();

        if (!empty($_GET['s'])) {
            $term = $_GET['s'];
            $reportecompras = $reportecompras->where(function ($query) use ($term) {
                $query->where('cod_compra', 'LIKE', "%$term%")
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

        $reportecompras = $reportecompras->get();

        if (request()->has('export')) {
            return Excel::download(new ComprasExport, 'compras.xlsx');
        }

        return view('reporte.index', compact('reportecompras'));
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
        compras::create($request->all());
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
        $reportecompra = compras::findOrFail($id);
        return redirect()->back()->with('success', 'actualizado exitosamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reportecompras = compras::findOrFail($id);
        $reportecompras->update($request->all());
        return redirect()->back()->with('success', 'actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reportecompras = compras::findOrFail($id);
        $reportecompras->delete();
        return redirect()->back()->with('success', 'actualizado exitosamente');
    }
}
