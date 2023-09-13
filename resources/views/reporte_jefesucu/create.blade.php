@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Reporte para') }} {{ $id_jefe }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('reportes.store', ['id_jefe' => $id_jefe]) }}" id="reporte-form">
                        @csrf
                        <input type="hidden" name="id_jefe" value="{{ $id_jefe }}">
                        
                        <div class="form-group">
                            <label for="reporte">{{ __('Reporte') }}:</label>
                            <textarea class="form-control" id="reporte" name="reporte" rows="5" required></textarea>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Botones con margen superior -->
            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('sucursal.listado') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
                <button type="submit" form="reporte-form" class="btn btn-primary ml-2">{{ __('Crear Reporte') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection
