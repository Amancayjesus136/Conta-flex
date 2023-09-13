@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Historial de Consultas de RUC</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Acción</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->user->name }}</td>
                        <td>{{ $consulta->accion }}</td>
                        <td>{{ $consulta->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
