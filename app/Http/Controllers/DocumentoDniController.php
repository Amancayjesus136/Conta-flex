<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Log;
use App\Models\DniConsultation;

class DocumentoDniController extends Controller
{
    public function consultardocumentoDni(Request $request)
    {
        $dni = $request->input('dni');
        $data = null; // Inicializamos $data en caso de no hacer una consulta

        // Realizar la consulta del DNI si se ha enviado el formulario con el número de DNI
        if ($request->has('dni')) {
            $response = Http::timeout(20)->get('https://api.apis.net.pe/v1/dni', [
                'numero' => $dni,
                'apis-token' => 'apis-token-1301.adsa-82CS1YrzRXRCe',
            ]);

            $data = $response->json();

            // Verificar si se ha realizado una consulta válida
            if (!empty($data)) {
                // Registrar la actividad en la tabla 'logs' solo si se ha hecho una consulta
                Log::create([
                    'user_id' => auth()->user()->id,
                    'accion' => 'Consultó el documento DNI: ' . $dni,
                ]);

                // Registrar la actividad general por abrir la vista de consulta de DNI
                app(ActivityLogGeneralController::class)->logActivity('Consultó DNI', 'Abrió la vista de consultas de DNI');

                // Almacenar los detalles de la consulta en la tabla 'dni_consultations'
                DniConsultation::create([
                    'user_id' => auth()->user()->id,
                    'nombres' => $data['nombres'],
                    'apellido_paterno' => $data['apellidoPaterno'],
                    'apellido_materno' => $data['apellidoMaterno'],
                    'numero_documento' => $data['numeroDocumento'],
                ]);
            }
        } 

        return view('consultar-documentodni', compact('data'));
    }

    public function historialActividades(Request $request)
    {
        $searchUser = $request->input('searchUser');
        $searchId = $request->input('searchId');
        $searchDate = $request->input('searchDate');
        $searchDNI = $request->input('searchDNI');

        $logs = Log::with('user')
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
            ->when($searchDNI, function ($query) use ($searchDNI) {
                return $query->where('accion', 'like', '%' . $searchDNI . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('historial-actividades', compact('logs', 'searchUser', 'searchId', 'searchDate', 'searchDNI'));
    }
}
