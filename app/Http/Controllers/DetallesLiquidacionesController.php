<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ventas;
use App\Models\Compras;


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
        return view('detalles.index', compact('reporteventas', 'reportecompras', 'sumBase', 'sumBase2'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
