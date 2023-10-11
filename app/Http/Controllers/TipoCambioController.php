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
        $tipocambio = new TipoCambio;
        $tipocambio->moneda = $request->moneda;
        $tipocambio->tipo_compra = $request->tipo_compra;
        $tipocambio->tipo_venta = $request->tipo_venta;
        $tipocambio->fecha_creacion = $request->fecha_creacion;

        $tipocambio->save();

        return response()->json(['success' => true, 'message' => 'Empresa registrada con éxito']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function consultarRuc(Request $request)
    {
        $ruc = $request->input('ruc');

        $data = null; // Inicializar $data en caso de no hacer una consulta

        if ($ruc) {
            $response = Http::timeout(30)->get('https://api.apis.net.pe/v1/ruc', [
                'numero' => $ruc,
                'apis-token' => 'apis-token-1301.adsa-82CS1YrzRXRCe',
            ]);

            $data = $response->json();

            // Registrar la consulta en la tabla logs_ruc solo si se ha hecho una consulta
            if (!empty($data)) {
                LogRuc::create([
                    'user_id' => auth()->user()->id,
                    'accion' => 'Consultó el RUC: ' . $ruc,
                ]);

                // Registrar la actividad general por abrir la vista de consulta de RUC
                app(ActivityLogGeneralController::class)->logActivity('Consultó RUC', 'Abrió la vista de consultas de RUC');
            }
        }

        return view('tipo_cambio', compact('data'));
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
