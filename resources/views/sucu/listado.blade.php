@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Listado de Jefes de Sucursal') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Nombre Jefe') }}</th>
                                <th>{{ __('Nombre Sucursal') }}</th>
                                <th>{{ __('Ciudad') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jefes as $jefe)
                                <tr>
                                    <td>{{ $jefe->id_jefe }}</td>
                                    <td>{{ $jefe->nombre }}</td>
                                    <td>{{ $jefe->sucursal->nombre }}</td>
                                    <td>{{ $jefe->sucursal->ciudad->nombre_ciudad }}, {{ $jefe->sucursal->ciudad->nombre_pais }}</td>
                                    <td>
                                        <a href="{{ route('jefe.reportes', $jefe->id_jefe) }}" class="btn btn-primary">{{ __('Reporte') }}</a>
                                    </td>
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
