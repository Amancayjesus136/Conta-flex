@extends('layouts.app')

@section('content')
    <h1>Crear Jefe de Sucursal</h1>

    <form action="{{ route('jefes_sucursal.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="sucursal_id">Sucursal:</label>
            <select name="sucursal_id" id="sucursal_id" class="form-control" required>
                <option value="">Seleccione una sucursal</option>
                @foreach ($sucursales as $sucursal)
                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
