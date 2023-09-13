@extends('layouts.admin')

@section('content')
<link href="/ruta/hacia/bootstrap-icons.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between">
            <h4 class="mb-0 text-center">Registros de Entradas y Salidas</h4>
            <a href="{{ route('registrar-vehiculo') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Agregar el formulario de búsqueda -->
                <form action="{{ route('vehiculos-placas') }}" method="GET" class="mb-3">
    <div class="row">
        <div class="col-md-4 mb-2">
            <input type="text" name="placa" class="form-control" placeholder="Buscar por placa">
        </div>
        <div class="col-md-4 mb-2">
            <input type="date" name="fecha" class="form-control">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('vehiculos-placas') }}" class="btn btn-secondary">Limpiar</a>
        </div>
    </div>
</form>


                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>N° Registro</th>
                            <th>Fecha</th>
                            <th>Placa</th>
                            <th>Dirección</th>
                            <th>Hora Entrada</th>
                            <th>Hora Salida</th>
                            <th>Total Horas</th>
                            <th>AB</th>
                            <th>Tipo</th>
                            <th>Tipo %</th>
                            <th>IZQ</th>
                            <th>DER</th>
                            <th>Costo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehiculosPlacas as $index => $vehiculo)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $vehiculo->Fecha }}</td>
                                <td>{{ $vehiculo->Placa }}</td>
                                <td>{{ $vehiculo->Direccion }}</td>
                                <td>{{ $vehiculo->Hora_Entrada }}</td>
                                <td>{{ $vehiculo->Hora_Salida }}</td>
                                <td>{{ $vehiculo->Total_Horas }}</td>
                                <td>{{ $vehiculo->AB }}</td>
                                <td>{{ $vehiculo->Tipo }}</td>
                                <td>{{ $vehiculo->Tipo_Porcentaje }}</td>
                                <td>{{ $vehiculo->IZQ }}</td>
                                <td>{{ $vehiculo->DER }}</td>
                                <td>{{ $vehiculo->Probabilidad }}</td>
                                <td>
                                    <!-- Enlaces para editar y eliminar en la misma fila -->
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('editar_registro', ['id' => $vehiculo->id]) }}" class="btn btn-primary me-2">
                                        <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('eliminar_vehiculo', ['id' => $vehiculo->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                                            <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection