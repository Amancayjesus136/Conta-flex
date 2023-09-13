<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsultaPlacaController extends Controller
{
    public function documentoplaca()
    {
        return view('consultar-placa');
    }
}
