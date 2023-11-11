<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogRuc;

use Illuminate\Support\Facades\Http;


class GetPostController extends Controller
{
    public function index()
    {
        return view('getpost.index');
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

        return view('getpost.index', compact('data'));
    }
    
}
