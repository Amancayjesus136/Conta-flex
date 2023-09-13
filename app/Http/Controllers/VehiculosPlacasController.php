<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehiculoPlacas;
use App\Http\Controllers\ActivityLogGeneralController;

class VehiculosPlacasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Registrar actividad de búsqueda
        app(ActivityLogGeneralController::class)->logActivity('Búsqueda de Vehículos', 'Un usuario realizó una búsqueda de vehículos.');

        $placa = $request->input('placa');
        $fecha = $request->input('fecha');

        $query = VehiculoPlacas::query();

        if ($placa) {
            $query->where('Placa', 'like', '%' . $placa . '%');
        }

        if ($fecha) {
            $query->whereDate('Fecha', $fecha);
        }

        $vehiculosPlacas = $query->latest()->get(); // Obtener los registros más recientes primero

        return view('vehiculos-placas.index', compact('vehiculosPlacas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Registrar actividad de acceso al formulario de creación
        app(ActivityLogGeneralController::class)->logActivity('Acceso a Formulario de Creación', 'Un usuario accedió al formulario de creación de vehículos.');

        return view('vehiculos-placas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los campos si es necesario
        $data = $request->all();
        VehiculoPlacas::create($data);

        // Registrar actividad de registro
        app(ActivityLogGeneralController::class)->logActivity('Registro de Vehículo', 'Se registró un nuevo vehículo.');

        return redirect()->route('vehiculos-placas')->with('success', 'Vehículo registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Registrar actividad de acceso al formulario de edición
        app(ActivityLogGeneralController::class)->logActivity('Acceso a Formulario de Edición', 'Un usuario accedió al formulario de edición de vehículo.');

        $vehiculo = VehiculoPlacas::findOrFail($id);
        return view('vehiculos-placas.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehiculo = VehiculoPlacas::findOrFail($id);
        $data = $request->all();
        $vehiculo->update($data);

        // Registrar actividad de actualización
        app(ActivityLogGeneralController::class)->logActivity('Actualización de Vehículo', 'Se actualizó un vehículo.');

        return redirect()->route('vehiculos-placas')->with('success', 'Vehículo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiculo = VehiculoPlacas::findOrFail($id);
        $vehiculo->delete();

        // Registrar actividad de eliminación
        app(ActivityLogGeneralController::class)->logActivity('Eliminación de Vehículo', 'Se eliminó un vehículo.');

        return redirect()->route('vehiculos-placas')->with('success', 'Vehículo eliminado exitosamente');
    }
}
