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
                <div class="form-group">
                    <label for="ruc">Número de RUC</label>
                    <input type="text" class="form-control" name="ruc" id="ruc" required placeholder="Ingrese el RUC">
                </div>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </form>

            @if(isset($data))
                @if(isset($data['error']))
                    <div class="alert alert-danger">
                        <strong>Error:</strong> {{ $data['error'] }}
                    </div>
                @else
                    <h3 class="text-center mb-4">Resultado:</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Número de RUC</label>
                            <p>{{ $data['numeroDocumento'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label>Nombre</label>
                            <p>{{ $data['nombre'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label>Estado</label>
                            <p>{{ $data['estado'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label>Condición</label>
                            <p>{{ $data['condicion'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label>Dirección</label>
                            <p>{{ $data['direccion'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label>Ubigeo</label>
                            <p>{{ $data['ubigeo'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label>Provincia</label>
                            <p>{{ $data['provincia'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label>Departamento</label>
                            <p>{{ $data['departamento'] }}</p>
                        </div>
                    </div>
                @endif
            @endif

            <div class="text-center">
                <a href="/" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endsection
