<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;

class VentasController extends Controller
{
    public function index()
    {
        return view ('ventas.index');

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Crear una nueva instancia del modelo Ventas y establecer los valores de los campos
        $venta = new Ventas();
        $venta->cod_compra = $request->input('cod_compra');
        $venta->tipo_cambio = $request->input('tipo_cambio');
        $venta->fecha_comprobante = $request->input('fecha_comprobante');
        $venta->ruc = $request->input('ruc');
        $venta->nombre_proveedor = $request->input('nombre_proveedor');
        $venta->documento = $request->input('documento');
        $venta->factura_numero = $request->input('factura_numero');
        $venta->fecha_emision = $request->input('fecha_emision');
        $venta->fecha_venta = $request->input('fecha_venta');
        $venta->base_disponible = $request->input('base_disponible');
        $venta->IGV = $request->input('IGV');
        $venta->total = $request->input('total');
        $venta->tasa_IGV = $request->input('tasa_IGV');
        // Asigna valores a otros campos según sea necesario
        // Continúa asignando valores a otros campos...

        // Guardar el modelo en la base de datos
        $venta->save();

        // Redirigir a la página de destino con un mensaje de éxito
        return redirect('ventas')->with('success', 'Registro exitoso');
    }

    public function consultarRuc(Request $request)
    {
        $ruc = $request->input('ruc');

        $data = null; // Inicializar $data en caso de no hacer una consulta

        if ($ruc) {
            $response = Http::timeout(30)->get('https://api.apis.net.pe/v1/ruc', [
                'numero' => $ruc,
                'apis-token' => 'apis-token-1301.adsa-82CS1YrzRXRCe',
            ]);

            $data = $response->json();

            // Registrar la consulta en la tabla logs_ruc solo si se ha hecho una consulta
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
