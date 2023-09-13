@extends('layouts.admin')

@section('content')
<div>
    <div style="overflow-x: auto;">
        <form action="{{ route('actividades-generales.index') }}" method="get" class="mb-4">
            <div class="form-row">
                <div class="col-md-4 mb-2">
                    <input type="text" class="form-control" name="searchUser" placeholder="Buscar por usuario" value="{{ request('searchUser') }}">
                </div>
                <div class="col-md-4 mb-2">
                    <input type="text" class="form-control" name="searchRol" placeholder="Buscar por rol" value="{{ request('searchRol') }}">
                </div>
                <div class="col-md-4 mb-2">
                    <input type="date" class="form-control" name="searchDate" value="{{ request('searchDate') }}">
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ route('actividades-generales.index') }}" class="btn btn-secondary">Limpiar</a>
                </div>
            </div>
        </form>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
            <!-- Encabezados de la tabla -->
            <thead>
                <tr>
                    <th style="padding: 12px; text-align: left;">Usuario</th>
                    <th style="padding: 12px; text-align: left;">Rol</th>
                    <th style="padding: 12px; text-align: left;">Vista</th>
                    <th style="padding: 12px; text-align: left;">Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td style="padding: 8px; border-top: 1px solid #ddd;">{{ $log->user->name }}</td>
                        <td style="padding: 8px; border-top: 1px solid #ddd;">{{ $log->accion }}</td>
                        <td style="padding: 8px; border-top: 1px solid #ddd;">{{ $log->vista }}</td>
                        <td style="padding: 8px; border-top: 1px solid #ddd;">{{ $log->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
