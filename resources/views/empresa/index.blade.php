@extends('layouts.admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Listado de Personas</h1>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">
                Crear Compañia
            </button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#asignarModal">
                Asignar Compañía
            </button>
        </div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Compañia</th>
                <th>Nombre de la empresa</th>
                <th>Plan Cuentas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->id }}</td>
                    <td>{{ $empresa->compania }}</td>
                    <td>{{ $empresa->nombre_empresa }}</td>
                    <td>{{ $empresa->plan_cuentas }}</td>
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
                    <div class="mb-3">
                        <label for="plan_cuentas" class="form-label">Plan Cuentas</label>
                        <input type="text" class="form-control" id="plan_cuentas" name="plan_cuentas" required>
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

<!-- Modal de Asignar -->
<div class="modal fade" id="asignarModal" tabindex="-1" aria-labelledby="asignarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="asignarModalLabel">Asignar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('asignar.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Selecciona un usuario</label>
                        <select class="form-select" id="usuario" name="usuario" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="empresa" class="form-label">Selecciona una empresa</label>
                        <select class="form-select" id="empresa" name="empresa" required>
                            <option value="" disabled selected>Selecciona una empresa</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->compania }}</option>
                            @endforeach
                        </select>
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
