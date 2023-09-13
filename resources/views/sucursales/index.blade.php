@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-70 d-flex align-items-center" style="margin-top: 100px;">
    <div class="card shadow mx-auto">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Listado de Sucursales</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID Jefe</th>
                            <th>Nombre Jefe</th>
                            <th>Nombre Sucursal</th>
                            <th>Dirección Sucursal</th>
                            <th>Teléfono Sucursal</th>
                            <th>Email Sucursal</th>
                            <th>Hora Apertura</th>
                            <th>Hora Cierre</th>
                            <th>Activo</th>
                            <th>Nombre Ciudad</th>
                            <th>País Ciudad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sucursales as $sucursal)
                            <tr>
                                <td>{{ $sucursal->jefeSucursal->id }}</td>
                                <td>{{ $sucursal->jefeSucursal->nombre }}</td>
                                <td>{{ $sucursal->nombre }}</td>
                                <td>{{ $sucursal->direccion }}</td>
                                <td>{{ $sucursal->telefono }}</td>
                                <td>{{ $sucursal->email }}</td>
                                <td>{{ $sucursal->hora_apertura }}</td>
                                <td>{{ $sucursal->hora_cierre }}</td>
                                <td>{{ $sucursal->activo ? 'Activo' : 'Inactivo' }}</td>
                                <td>{{ $sucursal->ciudad->nombre }}</td>
                                <td>{{ $sucursal->ciudad->pais }}</td>
                                <td>
                                    <!-- Agrega aquí los botones de detalles, editar y eliminar -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <a href="{{ route('sucursales.create') }}" class="btn btn-primary">Agregar Nueva Sucursal</a>
</div>
@endsection
