<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compras;

class ComprasController extends Controller
{
    public function index()
    {
        return view ('compras.index');
    }

    public function consultarRuc(Request $request)
    {
        $ruc = $request->input('ruc');

        $data = null;

        if ($ruc) {
            $response = Http::timeout(30)->get('https://api.apis.net.pe/v1/ruc', [
                'numero' => $ruc,
                'apis-token' => 'apis-token-1301.adsa-82CS1YrzRXRCe',
            ]);

            $data = $response->json();

            if (!empty($data)) {
                LogRuc::create([
                    'user_id' => auth()->user()->id,
                    'accion' => 'Consultó el RUC: ' . $ruc,
                ]);

                app(ActivityLogGeneralController::class)->logActivity('Consultó RUC', 'Abrió la vista de consultas de RUC');
            }
        }

        return view('compras.index', compact('data'));
    }

    public function store(Request $request)
    {
        compras::create([
            'cod_compra' => $request->input('cod_compra'),
            'tipo_cambio' => $request->input('tipo_cambio'),
            'fecha_comprobante' => $request->input('fecha_comprobante'),
            'ruc' => $request->input('ruc'),
            'nombre' => $request->input('nombre'),
            'documento' => $request->input('documento'),
            'factura_numero' => $request->input('factura_numero'),
            'fecha_emision' => $request->input('fecha_emision'),
            'fecha_compra' => $request->input('fecha_compra'),
            'consulta' => $request->input('consulta'),
            'base_disponible' => $request->input('base_disponible'),
            'IGV' => $request->input('IGV'),
            'total' => $request->input('total'),
        ]);

        return redirect()->back()->with('success', 'Registro almacenado correctamente');
    }
}
