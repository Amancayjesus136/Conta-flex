<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DocumentoController extends Controller
{
    public function documentoDni(Request $request)
    {
        $dni = $request->input('dni');

        $response = Http::timeout(20)->get('https://api.apis.net.pe/v1/dni', [
            'numero' => $dni,
            'apis-token' => 'apis-token-1301.adsa-82CS1YrzRXRCe',
        ]);

        $data = $response->json();

        return view('consultar-documento', compact('data'));
    }
}
