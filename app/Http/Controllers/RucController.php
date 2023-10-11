<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\LogRuc;
use App\Models\User;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;

class RucController extends Controller
{
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

                // Registrar la actividad general por abrir la vista de consulta de RUC
                app(ActivityLogGeneralController::class)->logActivity('Consultó RUC', 'Abrió la vista de consultas de RUC');
            }
        }

        return view('consultar-ruc', compact('data'));
    }

    public function historialConsultasRuc(Request $request)
    {
        $searchUser = $request->input('searchUser');
        $searchId = $request->input('searchId');
        $searchDate = $request->input('searchDate');
        $searchRUC = $request->input('searchRUC');

        $consultas = LogRuc::with('user')
            ->when($searchUser, function ($query) use ($searchUser) {
                return $query->whereHas('user', function ($query) use ($searchUser) {
                    $query->where('name', 'like', '%' . $searchUser . '%');
                });
            })
            ->when($searchId, function ($query) use ($searchId) {
                return $query->where('id', $searchId);
            })
            ->when($searchDate, function ($query) use ($searchDate) {
                return $query->whereDate('created_at', '=', $searchDate);
            })
            ->when($searchRUC, function ($query) use ($searchRUC) {
                return $query->where('accion', 'like', '%' . $searchRUC . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('historial-consultas-ruc', compact('consultas', 'searchUser', 'searchId', 'searchDate', 'searchRUC'));
    }
}
