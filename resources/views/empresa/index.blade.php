@extends('layouts.admin')

@section('content')
<!-- JavaScript de Bootstrap (si deseas utilizar los componentes interactivos) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Listado de Personas</h1>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">
                Agregar Compañia
            </button>
        </div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Compañia</th>
                <th>Nombre de la empresa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->id }}</td>
                    <td>{{ $empresa->compania }}</td>
                    <td>{{ $empresa->nombre_empresa }}</td>
                    <!-- Aquí puedes agregar botones de editar y eliminar si es necesario -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de Agregar -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarModalLabel">Agregar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('empresa.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="compania" class="form-label">Compañia</label>
                        <input type="text" class="form-control" id="compania" name="compania" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_empresa" class="form-label">Nombre de la Empresa</label>
                        <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
