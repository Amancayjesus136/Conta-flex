<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Placa;
use Illuminate\Http\Request;
use App\Models\ActivityLogGeneral;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    // Aquí va el api"
    public function index()
    {
        return view('consulta.index');
    }

    public function guardarDatos(Request $request)
    {
        // Obtener los datos del formulario
        $data = $request->all();

        // Guardar los datos en la tabla "usuarios"
        $usuario = new Usuario();
        $usuario->propietario = $data['propietario'];
        $usuario->descripcion = $data['descripcion'];
        $usuario->tipo_documento = $data['tipo_documento'];
        $usuario->documento = $data['documento'];
        // Completa los demás campos del usuario
        $usuario->save();

        // Guardar los datos en la tabla "placas"
        $placa = new Placa();
        $placa->placa = $data['placa'];
        $placa->tarjeta = $data['tarjeta'];
        $placa->fecha = $data['fecha'];
        $placa->serie = $data['serie'];
        $placa->marca = $data['marca'];
        $placa->titulo_Anio = $data['titulo_Anio'];
        $placa->titulo_nro = $data['titulo_nro'];
        $placa->tipo_propietario = $data['tipo_propietario'];
        $placa->modelo = $data['modelo'];
        $placa->combustible = $data['combustible'];
        $placa->carroceria = $data['carroceria'];
        $placa->motor = $data['motor'];
        $placa->anio = $data['anio'];
        $placa->clase = $data['clase'];
        $placa->color = $data['color'];
        $placa->cilindros = $data['cilindros'];
        $placa->asientos = $data['asientos'];
        $placa->longitud = $data['longitud'];
        $placa->ancho = $data['ancho'];
        $placa->altura = $data['altura'];
        $placa->peso_bruto = $data['peso_bruto'];
        $placa->estado = $data['estado'];
        // Completa los demás campos del vehículo
        $placa->save();

        // Asociar usuario con placa
        $usuario->placa()->associate($placa);
        $usuario->save();

        // Registrar la actividad en la tabla 'activity_log_generals' para la consulta de placas
        app(ActivityLogGeneralController::class)->logActivity('Consultó placas', 'Realizó una consulta de placas');

        return response()->json(['message' => 'Datos guardados correctamente']);
    }
}
