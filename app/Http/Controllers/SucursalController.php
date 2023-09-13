<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JefeSucursal;
use App\Models\Sucursal;
use App\Models\Ciudad;
use App\Models\Reporte;

class SucursalController extends Controller
{
    public function index()
    {
        $jefes = JefeSucursal::with('sucursal.ciudad')->get();
        return view('listado', compact('jefes'));
    }

    public function listado()
    {
        $jefes = JefeSucursal::with('sucursal.ciudad')->get();
        return view('sucu.listado', compact('jefes'));
    }

    public function crear(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_sucursal' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'hora_apertura' => 'required',
            'hora_cierre' => 'required',
            'activo' => 'required|boolean',
            'nombre_ciudad' => 'required|string|max:255', // Asegúrate de que este campo esté en tu formulario
            'pais' => 'required|string|max:255', // Asegúrate de que este campo esté en tu formulario
            // Agrega aquí las reglas de validación para otros campos si es necesario
        ]);

        $ciudad = Ciudad::firstOrCreate([
            'nombre_ciudad' => $validatedData['nombre_ciudad'],
            'nombre_pais' => $validatedData['pais'],
        ]);

        $sucursal = new Sucursal([
            'nombre' => $validatedData['nombre_sucursal'],
            'direccion' => $validatedData['direccion'],
            'telefono' => $validatedData['telefono'],
            'email' => $validatedData['email'],
            'hora_apertura' => $validatedData['hora_apertura'],
            'hora_cierre' => $validatedData['hora_cierre'],
            'activo' => $validatedData['activo'],
            'id_ciudad' => $ciudad->id_ciudad,
        ]);
        $sucursal->save();

        $jefe = new JefeSucursal();
        $jefe->nombre = $validatedData['nombre'];
        $jefe->sucursal()->associate($sucursal);
        $jefe->save();

        // Registrar actividad de creación
        app(ActivityLogGeneralController::class)->logActivity('Creación de Sucursal y Jefe', 'Se creó una nueva sucursal y un nuevo jefe.');

        return redirect()->route('listado')->with('success', 'Registro creado exitosamente.');
    }


    public function show($id)
    {
        $jefe = JefeSucursal::with('sucursal.ciudad')->findOrFail($id);
        $sucursal = $jefe->sucursal;

        return view('detalles', compact('jefe', 'sucursal'));
    }

    public function reportes($id)
    {
        $jefe = JefeSucursal::with('sucursal.ciudad')->findOrFail($id);
        $reportes = Reporte::where('jefe_sucursal_id', $jefe->id_jefe)->get();

        return view('reportes', compact('jefe', 'reportes'));
    }

    public function edit($id)
    {
        $jefe = JefeSucursal::with('sucursal.ciudad')->findOrFail($id);
        return view('editar', compact('jefe'));
    }

    public function update(Request $request, $id)
    {
        $jefe = JefeSucursal::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_sucursal' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'hora_apertura' => 'required',
            'hora_cierre' => 'required',
            'activo' => 'required|boolean',
            'nombre_ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            // Agrega aquí las reglas de validación para otros campos
        ]);

        $jefe->nombre = $validatedData['nombre'];

        if ($jefe->sucursal) {
            $sucursal = $jefe->sucursal;
            $sucursal->nombre = $validatedData['nombre_sucursal'];
            $sucursal->direccion = $validatedData['direccion'];
            $sucursal->telefono = $validatedData['telefono'];
            $sucursal->email = $validatedData['email'];
            $sucursal->hora_apertura = $validatedData['hora_apertura'];
            $sucursal->hora_cierre = $validatedData['hora_cierre'];
            $sucursal->activo = $validatedData['activo'];

            $ciudad = Ciudad::firstOrCreate([
                'nombre_ciudad' => $validatedData['nombre_ciudad'],
                'nombre_pais' => $validatedData['pais'],
            ]);

            $sucursal->id_ciudad = $ciudad->id_ciudad;
            $sucursal->save();
        }

        $jefe->save();

        return redirect()->route('listado')->with('success', 'Registro actualizado exitosamente.');
    }

    public function eliminar($id)
    {
        $jefe = JefeSucursal::findOrFail($id);
        $jefe->delete();

        return redirect()->route('listado')->with('success', 'Registro eliminado exitosamente.');
    }

    public function mostrarDetalles($id)
    {
        $jefe = JefeSucursal::with('sucursal.ciudad')->findOrFail($id);
        return response()->json([
            'id_jefe' => $jefe->id_jefe,
            'nombre_jefe' => $jefe->nombre,
            'id_sucursal' => $jefe->sucursal->id_sucursal,
            'nombre_sucursal' => $jefe->sucursal->nombre,
            'direccion' => $jefe->sucursal->direccion,
            'telefono' => $jefe->sucursal->telefono,
            'email' => $jefe->sucursal->email,
            'hora_apertura' => $jefe->sucursal->hora_apertura,
            'hora_cierre' => $jefe->sucursal->hora_cierre,
            'activo' => $jefe->sucursal->activo ? 'Sí' : 'No',
            'id_ciudad' => $jefe->sucursal->ciudad->id_ciudad,
            'nombre_ciudad' => $jefe->sucursal->ciudad->nombre_ciudad,
            'pais' => $jefe->sucursal->ciudad->nombre_pais,
        ]);
    }
}
