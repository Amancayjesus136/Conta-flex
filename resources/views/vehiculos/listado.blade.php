@extends('layouts.admin')

@section('content')



@extends('layouts.app')

@section('content')
    <h1>Listado de Registros</h1>

    @if(session('message'))
        <div>{{ session('message') }}</div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Placa</th>
                <th>Confianza Placa</th>
                <th>Tipo</th>
                <th>Confianza Tipo</th>
                <th>Dirección</th>
                <th>Hora Entrada</th>
                <th>Hora Salida</th>
                <th>Total Horas</th>
                <th>IZQ</th>
                <th>DER</th>
                <th>Probabilidad</th>
                <th>AB</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
                <tr>
                    <td>{{ $registro->Fecha }}</td>
                    <td>{{ $registro->Placa }}</td>
                    <td>{{ $registro->Confianza_Placa }}</td>
                    <td>{{ $registro->Tipo }}</td>
                    <td>{{ $registro->Confianza_Tipo }}</td>
                    <td>{{ $registro->Direccion }}</td>
                    <td>{{ $registro->Hora_Entrada }}</td>
                    <td>{{ $registro->Hora_Salida }}</td>
                    <td>{{ $registro->Total_Horas }}</td>
                    <td>{{ $registro->IZQ }}</td>
                    <td>{{ $registro->DER }}</td>
                    <td>{{ $registro->Probabilidad }}</td>
                    <td>{{ $registro->AB }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection




@endsection