<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class ConsultaTipoCambioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('consultatipocambio');
    }

    public function consultarTipoCambio(Request $request)
{
    $fecha = $request->input('fecha'); // Asegúrate de obtener el valor correcto del formulario, este puede variar según el nombre del campo en el formulario

    $data = null;

    if ($fecha) {
        $response = Http::timeout(30)->get('https://api.apis.net.pe/v1/tipo-cambio-sunat?', [
            'date' => $fecha,
            'apis-token' => 'apis-token-5787.JDcEODexUBJ4HISBmUT6svVY2O6HXtQT',
        ]);

        $data = $response->json();
    }

    return view('consultatipocambio', compact('data'));
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
        //
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
