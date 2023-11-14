<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Exception;

class ErrorController extends Controller
{
    public function handleUndefinedMethod(Exception $exception)
    {
        if ($exception instanceof \BadMethodCallException) {
            return view('esperar_superadmin'); // Muestra la vista personalizada
        }

        // Si no es la excepción esperada, maneja según sea necesario
        abort(500, 'Error interno del servidor');
    }
}

