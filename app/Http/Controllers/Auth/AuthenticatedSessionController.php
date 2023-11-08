<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Activitylog\LogOptions;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $data = $request->all();
        $usuario = User::where('email', $data['email'])->first();

        if ($this->checkUserRoleAndAuthenticate($usuario)) {
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return back()->with('error', 'No tienes permiso para acceder al Sistema. Solicita un rol al superadministrador');
        }
    }

    private function checkUserRoleAndAuthenticate($usuario): bool
    {
        if ($usuario) {
            $rolesUsuario = $usuario->getRoleNames();

            if ($rolesUsuario->contains('superadministrador') || $rolesUsuario->contains('admin') || $rolesUsuario->contains('jefesucursal') || $rolesUsuario->contains('operador')) {
                Auth::login($usuario); 
                request()->session()->regenerate();
                return true;
            }
        }

        return false;
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
