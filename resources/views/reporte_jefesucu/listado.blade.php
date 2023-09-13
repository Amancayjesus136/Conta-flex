@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Listado de Reportes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jefe</th>
                    <th>Reporte</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportes as $reporte)
                    <tr>
                        <td>{{ $reporte->id }}</td>
                        <td>{{ $reporte->jefe->nombre }}</td>
                        <td>{{ $reporte->reporte }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
