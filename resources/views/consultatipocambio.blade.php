@extends('layouts.admin')

@section('content')
<form action="/consultar-tipo-cambio" method="post">
    @csrf
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha:</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Consultar</button>
    </div>
</form>

@if(isset($data))
    @if(isset($data['error']))
        <div class="alert alert-danger mt-3">
            <strong>Error:</strong> {{ $data['error'] }}
        </div>
    @else
        <h3 class="text-center mt-4">Resultado:</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <th class="bg-white text-black">Compra</th>
                    <td>{{ $data['compra'] }}</td>
                </tr>
                <tr>
                    <th class="bg-white text-black">Venta</th>
                    <td>{{ $data['venta'] }}</td>
                </tr>
                <tr>
                    <th class="bg-white text-black">Origen</th>
                    <td>{{ $data['origen'] }}</td>
                </tr>
                <tr>
                    <th class="bg-white text-black">Moneda</th>
                    <td>{{ $data['moneda'] }}</td>
                </tr>
                <tr>
                    <th class="bg-white text-black">Fecha</th>
                    <td>{{ $data['fecha'] }}</td>
                </tr>
            </table>
        </div>
    @endif
@endif

@endsection
