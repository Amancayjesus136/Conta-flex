<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user) {
            // Si no hay un usuario autenticado, redirigir a la página de inicio de sesión
            return redirect('/login');
        }

        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                // Si el usuario tiene alguno de los roles requeridos, permitir el acceso
                return $next($request);
            }
        }

        // Si el usuario no tiene ninguno de los roles requeridos, redirigir a una página de error o denegar el acceso
        abort(403, 'Acceso denegado');
    }
}
