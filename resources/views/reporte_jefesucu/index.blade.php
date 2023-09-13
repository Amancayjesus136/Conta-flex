@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de Reportes') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID REPORTE</th>
                                <th>ID Jefe de Sucursal</th>
                                <th>Reporte</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reportes as $reporte)
                            <tr>
                                <td>{{ $reporte->id_reporte }}</td>
                                <td>{{ $reporte->id_jefe }}</td>
                                <td>{{ $reporte->reporte }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
