<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoCambio;
use App\Models\Datos;
use App\Models\LogTipoCambio;


class TipoCambioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ultimoRegistro = Datos::latest('created_at')->first();
        $ultimoRegistro2 = Datos::latest('created_at')->first();
        $tipocambios = TipoCambio::query();
        if (!empty($request->get('s'))) {
            $term = $request->get('s');
            $tipocambios = $tipocambios->where(function ($query) use ($term) {
                $query->where('moneda', 'LIKE', "%$term%")
                    ->orWhere('tipo_compra', 'LIKE', "%$term%")
                    ->orWhere('tipo_venta', 'LIKE', "%$term%")
                    ->orWhere('fecha_creacion', 'LIKE', "%$term%");
            });
        }
    
        $porPagina = 10; // Número de registros por página
            $tipocambios = $tipocambios->paginate($porPagina);
        return view('tipo_cambio.index', compact('tipocambios', 'ultimoRegistro', 'ultimoRegistro2'));
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
        $tipocambio = new TipoCambio;
        $tipocambio->moneda = $request->moneda;
        $tipocambio->tipo_compra = $request->tipo_compra;
        $tipocambio->tipo_venta = $request->tipo_venta;
        $tipocambio->fecha_creacion = $request->fecha_creacion;

        $tipocambio->save();

        return response()->json(['success' => true, 'message' => 'Empresa registrada con éxito']);

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
        $tipocambio = TipoCambio::findOrFail($id);
        return redirect()->back()->with('success', 'Tipo de compra actualizado exitosamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipocambio = TipoCambio::findOrFail($id);
        $tipocambio->update($request->all());
        return redirect()->back()->with('success', 'Tipo de compra actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipocambio = TipoCambio::findOrFail($id);
        $tipocambio->delete();
        return redirect()->back()->with('success', 'Tipo de compra eliminado exitosamente');
    }
}
