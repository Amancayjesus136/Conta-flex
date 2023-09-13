<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsignarUsuario;
use App\Models\Empresa;



class AsignarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index', compact('empresas', 'users'));
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
    // Valida los datos del formulario
    $request->validate([
        'usuario' => 'required|integer',
        'empresa' => 'required|integer',
    ]);

    // Busca una relación existente entre el usuario y la empresa
    $asignarUsuario = AsignarUsuario::where('usuario', $request->usuario)->first();

    // Si se encuentra una relación existente, actualiza la empresa
    if ($asignarUsuario) {
        $empresa = Empresa::findOrFail($request->empresa); // Obtén la empresa seleccionada
        $asignarUsuario->empresa = $empresa->id;
        $asignarUsuario->save();
    } else {
        // Si no existe una relación, crea una nueva
        AsignarUsuario::create([
            'usuario' => $request->usuario,
            'empresa' => $request->empresa,
        ]);
    }

    return redirect()->route('empresa.index');
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
