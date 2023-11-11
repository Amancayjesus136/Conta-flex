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
                <button type="submit" class="btn btn-primary">Consultar</button><br><br><br>
            </form>

            @if(isset($data))
                @if(isset($data['error']))
                    <div class="alert alert-danger">
                        <strong>Error:</strong> {{ $data['error'] }}
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6">
                            <label>Número de RUC</label>
                            <p>{{ $data['numeroDocumento'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label>Nombre</label>
                            <p>{{ $data['nombre'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="documento">NumeroDocumento: <span class="required">*</span></label>
                            <input type="number" class="form-control" id="documento" name="documento" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edad">edad: <span class="required">*</span></label>
                            <input type="number" class="form-control" id="edad" name="edad" required>
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
