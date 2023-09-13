@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-lg text-white">
                    <h2 class="text-center mb-0">Historial de Consultas de RUC</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('historial.consultas.ruc') }}" method="get" class="mb-4">
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <input type="text" class="form-control" name="searchUser" placeholder="Buscar por usuario" value="{{ request('searchUser') }}">
                            </div>
                            <div class="col-md-4 mb-2">
                                <input type="text" class="form-control" name="searchRUC" placeholder="Buscar por número de RUC" value="{{ request('searchRUC') }}">
                            </div>
                            <div class="col-md-4 mb-2">
                                <input type="date" class="form-control" name="searchDate" value="{{ request('searchDate') }}">
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                                <a href="{{ route('historial.consultas.ruc') }}" class="btn btn-secondary">Limpiar</a>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="bg-light">Usuario</th>
                                    <th class="bg-light">Acción</th>
                                    <th class="bg-light">Fecha y hora de consulta</th>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
