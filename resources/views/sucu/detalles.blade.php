@extends('layouts.admin')

@section('content')
    <h1>Detalles del Jefe de Sucursal</h1>
    <p>Nombre: {{ $jefe->nombre }}</p>
    <p>Sucursal: {{ $jefe->sucursal->nombre }}</p>
    <!-- Agrega aquí más detalles según necesites -->
    <a href="{{ route('listado') }}">Volver al Listado</a>
@endsection