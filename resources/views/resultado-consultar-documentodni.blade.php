@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Resultado de Consulta de DNI</h2>
    @if ($data)
    <table class="table">
        <thead>
            <tr>
                <th>Campo 1</th>
                <th>Campo 2</th>
                <!-- Agrega aquí más columnas para mostrar los campos de los datos del DNI -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data['campo1'] }}</td>
                <td>{{ $data['campo2'] }}</td>
                <!-- Agrega aquí más celdas para mostrar los campos de los datos del DNI -->
            </tr>
        </tbody>
    </table>
    @else
    <p>No se encontraron resultados para el DNI consultado.</p>
    @endif
</div>
@endsection
