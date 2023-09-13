@extends('layouts.app')

@section('content')
    <h1>Jefes de Sucursal</h1>

    <a href="{{ route('jefes_sucursal.create') }}" class="btn btn-primary mb-2">Crear Jefe de Sucursal</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Sucursal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jefesSucursal as $jefeSucursal)
                <tr>
                    <td>{{ $jefeSucursal->nombre }}</td>
                    <td>{{ $jefeSucursal->sucursal->nombre }}</td>
                    <td>
                        <a href="{{ route('jefes_sucursal.edit', $jefeSucursal) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('jefes_sucursal.destroy', $jefeSucursal) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este jefe de sucursal?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
