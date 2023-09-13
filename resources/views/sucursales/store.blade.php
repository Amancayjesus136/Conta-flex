@extends('layouts.admin')

@section('content')

<div class="container mt-4">
    <h2>Nueva Sucursal Creada</h2>
    <p>La sucursal se ha creado exitosamente.</p>
    
    <a href="{{ route('sucursales.index') }}" class="btn btn-primary">Volver al Listado de Sucursales</a>
</div>

@endsection
