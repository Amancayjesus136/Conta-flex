@extends('layouts.admin')

@section('content')
    <h1>Editar Jefe de Sucursal</h1>
    <form action="{{ route('jefe.update', $jefe->id_jefe) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Agrega los campos de edición aquí -->
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="{{ route('listado') }}">Volver al Listado</a>
@endsection