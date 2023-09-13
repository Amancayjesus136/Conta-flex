<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehiculoEntradaSalida;

class VehiculoController extends Controller
{
    public function mostrarFormularioEntrada()
    {
        return view('vehiculos.formulario');
    }

    public function registrarEntradaSalida(Request $request)
    {
        // Validar los datos ingresados en el formulario
        $request->validate([
            'Fecha' => 'required|date',
            'Placa' => 'required|string',
            'Direccion' => 'required|string',
            'Hora_Entrada' => 'required|date_format:H:i',
            'Hora_Salida' => 'nullable|date_format:H:i',
            'Total_Horas' => 'nullable|string',
            'AB' => 'required|numeric', // Asegúrate de tener el campo AB en tu formulario
            'Tipo' => 'required|string',
            'Tipo_Porcentaje' => 'required|string',
            'IZQ' => 'required|string',
            'DER' => 'required|string',
            'Probabilidad' => 'required|numeric',
            // Agrega las demás validaciones aquí
        ]);

        // Crear una nueva instancia de VehiculoEntradaSalida con los datos del formulario
        try {
            $entradaSalida = new VehiculoEntradaSalida([
                'Fecha' => $request->input('Fecha'),
                'Placa' => $request->input('Placa'),
                'Direccion' => $request->input('Direccion'),
                'Hora_Entrada' => $request->input('Hora_Entrada'),
                'Hora_Salida' => $request->input('Hora_Salida'),
                'Total_Horas' => $request->input('Total_Horas'),
                'AB' => $request->input('AB'), // Asegúrate de usar el nombre correcto en tu formulario
                'Tipo' => $request->input('Tipo'),
                'Tipo_Porcentaje' => $request->input('Tipo_Porcentaje'),
                'IZQ' => $request->input('IZQ'),
                'DER' => $request->input('DER'),
                'Probabilidad' => $request->input('Probabilidad'),
                // Agrega los demás campos aquí
            ]);

            // Guardar la entrada y salida en la base de datos
            $entradaSalida->save();

            // Redirigir a la vista de listado con un mensaje
            return redirect()->route('mostrar_listado')->with('success', 'Entrada y salida registradas con éxito.');
        } catch (\Exception $e) {
            // Capturar y mostrar el error
            return redirect()->back()->with('error', 'Error al registrar la entrada y salida: ' . $e->getMessage());
        }
    }
    

    public function mostrarListado()
    {
        $registros = VehiculoEntradaSalida::all();
        return view('vehiculos.listado', ['registros' => $registros]);
    }

    public function registrarSalida(Request $request, $id)
    {
        // Obtener el registro del vehículo por ID
        $vehiculo = VehiculoEntradaSalida::findOrFail($id);

        // Actualizar hora de salida y tiempo total
        $vehiculo->Hora_Salida = $request->input('Hora_Salida');
        // Calcula el tiempo total y guárdalo en $vehiculo->Total_Horas

        // Guardar los cambios en el vehículo
        $vehiculo->save();

        // Redirigir a la vista de listado con un mensaje
        return redirect()->route('listado')->with('success', 'Hora de salida registrada con éxito.');
    }
}
