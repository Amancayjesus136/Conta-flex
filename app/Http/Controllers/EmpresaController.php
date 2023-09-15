<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;
use App\Models\AsignarUsuario;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $empresas = Empresa::all();
        $personas = AsignarUsuario::all();
        return view('empresa.index', compact('empresas', 'users', 'personas'));
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
    // Crear una nueva empresa
    $empresa = new Empresa;
    $empresa->compania = $request->compania;
    $empresa->nombre_empresa = $request->nombre_empresa;
    $empresa->plan_cuentas = $request->plan_cuentas;

    $empresa->save();

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
    private function actualizarUsuario($userId, $companiaUsuario)
{
    // Obtener el usuario relacionado con el ID proporcionado
    $user = User::findOrFail($userId);

    // Actualizar el campo "compania_usuario" del usuario
    $user->compania_usuario = $companiaUsuario;
    $user->save();
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
