<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Datos; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsultaTipoCambioController extends Controller
{

    public function index()
    {
        return view('consultatipocambio');
    }

    public function consultatipocambio(Request $request)
{
    $fecha = $request->input('fecha');

    $data = null;

    if ($fecha) {
        $response = Http::timeout(30)->get('https://api.apis.net.pe/v1/tipo-cambio-sunat?', [
            'date' => $fecha,
            'apis-token' => 'apis-token-5787.JDcEODexUBJ4HISBmUT6svVY2O6HXtQT',
        ]);

        $data = $response->json();
    }

    return view('consultatipocambio', compact('data'));
}

public function store(Request $request)
{
    // Obteniendo datos del formulario
    $compra = $request->input('compra');
    $venta = $request->input('venta');
    $origen = $request->input('origen');
    $fecha = $request->input('fecha');

    // Guardando en la base de datos
    Datos::create([
        'compra' => $compra,
        'venta' => $venta,
        'origen' => $origen,
        'fecha' => $fecha,
    ]);

    return response()->json(['success' => true, 'message' => 'Datos guardados correctamente']);
}
}
