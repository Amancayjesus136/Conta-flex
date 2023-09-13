@extends('layouts.admin')

@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="card p-4 shadow text-center">
        <h2 class="mb-4">Reporte Creado Exitosamente</h2>
        <p>Tu reporte ha sido registrado correctamente. ¡Gracias por tu contribución!</p>
        <!-- Puedes agregar más contenido según tus necesidades -->
        <a href="{{ route('reportes.index') }}" class="btn btn-primary mt-4">Volver</a>
    </div>
</div>
@endsection
