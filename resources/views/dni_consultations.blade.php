@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-lg text-white">
                    <h2 class="text-center mb-0">Historial de Consultas de DNI</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="bg-light">Usuario</th>
                                    <th class="bg-light">Nombres</th>
                                    <th class="bg-light">Apellido Paterno</th>
                                    <th class="bg-light">Apellido Materno</th>
                                    <th class="bg-light">Número de DNI</th>
                                    <th class="bg-light">Fecha y Hora de Consulta</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log->user->name }}</td>
                                    <td>{{ $log->dniConsultation->nombres }}</td>
                                    <td>{{ $log->dniConsultation->apellido_paterno }}</td>
                                    <td>{{ $log->dniConsultation->apellido_materno }}</td>
                                    <td>{{ $log->dniConsultation->numero_documento }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
