<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoCambio;


class TipoCambioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipocambios = TipoCambio::all();
        return view('tipo_cambio.index', compact('tipocambios'));
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
        TipoCambio::create($request->all());
        return redirect()->route('tipo_cambio.index');
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
        $tipocambio = TipoCambio::findOrFail($id);
        return redirect()->back()->with('success', 'Tipo de compra actualizado exitosamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipocambio = TipoCambio::findOrFail($id);
        $tipocambio->update($request->all());
        return redirect()->back()->with('success', 'Tipo de compra actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipocambio = TipoCambio::findOrFail($id);
        $tipocambio->delete();
        return redirect()->back()->with('success', 'Tipo de compra eliminado exitosamente');
    }
}
