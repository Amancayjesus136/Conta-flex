<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;
use App\Models\AsignarUsuario;
use Illuminate\Support\Facades\DB;

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
        $empresa = new Empresa;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->plan_cuentas = $request->plan_cuentas;

        $empresa->save();

        return response()->json(['success' => true, 'message' => 'Empresa registrada con éxito']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $empresa = Empresa::findOrFail($id);
    $empresa->nombre_empresa = $request->editar_nombre_empresa;
    $empresa->plan_cuentas = $request->editar_plan_cuentas;
    $empresa->save();

    return redirect()->route('empresa.index')->with('success', 'Empresa actualizada con éxito');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return redirect()->route('empresa.index')->with('success', 'Empresa eliminada con éxito');
    }

}
