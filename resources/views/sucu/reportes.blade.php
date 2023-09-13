@extends('layouts.admin')

@section('content')
    <h1>Reportes del Jefe de Sucursal: {{ $jefe->nombre }}</h1>
    <ul>
        @foreach($reportes as $reporte)
            <li>{{ $reporte->titulo }}</li>
            <!-- Agrega más detalles del reporte si es necesario -->
        @endforeach
    </ul>
    <a href="{{ route('listado') }}">Volver al Listado</a>
@endsection
