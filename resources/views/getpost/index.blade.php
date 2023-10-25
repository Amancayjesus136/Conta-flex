@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-100 d-flex align-items-center">
    <div class="card shadow mx-auto">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Consulta de RUC</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('getpost.consultarRuc') }}" method="get">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="ruc" id="ruc" required placeholder="Ingrese el RUC">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </div>
                </div>

            @if(isset($data))
                @if(isset($data['error']))
                    <div class="alert alert-danger">
                        <strong>Error:</strong> {{ $data['error'] }}
                    </div>
                @else
                <h3 class="text-center mb-4">Resultado:</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="bg-white text-black">Número de RUC</th>
                                <td>{{ $data['numeroDocumento'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Nombre</th>
                                <td>{{ $data['nombre'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Estado</th>
                                <td>{{ $data['estado'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Condición</th>
                                <td>{{ $data['condicion'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Dirección</th>
                                <td>{{ $data['direccion'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Ubigeo</th>
                                <td>{{ $data['ubigeo'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Provincia</th>
                                <td>{{ $data['provincia'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Departamento</th>
                                <td>{{ $data['departamento'] }}</td>
                            </tr>
                        </table>
                    </div>
                @endif
            @endif
            <div class="text-center">
                    <a href="/" class="btn btn-primary">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection