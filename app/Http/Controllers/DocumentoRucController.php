<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DocumentoRucController extends Controller
{
    public function DocumentoRuc(Request $request)
    {
        $ruc = $request->input('ruc');

        $response = Http::timeout(30)->get('https://api.apis.net.pe/v1/ruc', [
            'numero' => $ruc,
            'apis-token' => 'apis-token-1301.adsa-82CS1YrzRXRCe',
        ]);

        $data = $response->json();

        return view('consultar-documentoruc', compact('data'));
    }
}
