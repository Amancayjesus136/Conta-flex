@extends('layouts.app')

@section('content')
    <h1>Editar Jefe de Sucursal</h1>

    <form action="{{ route('jefes_sucursal.update', $jefeSucursal) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $jefeSucursal->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="sucursal_id">Sucursal:</label>
            <select name="sucursal_id" id="sucursal_id" class="form-control" required>
                @foreach ($sucursales as $sucursal)
                    <option value="{{ $sucursal->id }}" {{ $sucursal->id == $jefeSucursal->sucursal_id ? 'selected' : '' }}>{{ $sucursal->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
