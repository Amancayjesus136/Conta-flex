@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-lg text-black">
                <h2 class="text-center mb-0">Listado de reportes</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Número de reporte</th>
                                <th>Usuario ID</th>
                                <th>Descripción</th>
                                <th>Fecha de reporte</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportes as $reporte)
                                <tr>
                                    <td>{{ $reporte->id }}</td>
                                    <td>{{ $reporte->usuario_id }}</td>
                                    <td>{{ $reporte->descripcion }}</td>
                                    <td>{{ $reporte->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
