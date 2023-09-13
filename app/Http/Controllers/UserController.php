<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Cargar los usuarios con sus roles
        $usuarios = User::with('roles')->get();
        $roles = Role::all(); // Obtener todos los roles disponibles

        return view('admin.index', compact('usuarios', 'roles'));
    }

    public function cambiarRoles(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $rolId = $request->input('rol', null);

        if ($rolId) {
            $rolSeleccionado = Role::findOrFail($rolId);

            // Desasignar todos los roles anteriores del usuario
            $usuario->syncRoles([$rolSeleccionado]);
        }

        return redirect()->back()->with('success', 'Rol actualizado correctamente');
    }

    public function eliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }
    

    
    public function getIconClassAttribute()
    {
        // Aquí, debes devolver el nombre de la clase de icono para cada rol.
        // Por ejemplo, si el nombre de la clase está almacenado en la columna 'icon_class' de la tabla roles:
        return $this->attributes['icon_class'];
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario antes de guardarlos en la base de datos

        $user = new User([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'full_name' => $request->input('full_name'),
            'user_type' => $request->input('user_type'),
        ]);

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    }

    public function show(User $usuarios)
    {
        return view('usuarios.index', compact('usuarios'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validar los datos del formulario antes de actualizarlos en la base de datos

        $user->update([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'full_name' => $request->input('full_name'),
            'user_type' => $request->input('user_type'),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }

    public function someAction()
    {
        // ... Código de la acción ...

        activity()->log('Descripción de la acción'); // Registra la actividad en el controlador

        // ... Más código ...
    }
    

    
}
