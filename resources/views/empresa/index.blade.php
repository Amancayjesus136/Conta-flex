@extends('layouts.admin')

@section('content')
<div class="col-12 col-md-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Compañias</h4>
    </div>
</div>
<div class="container">
    <div class="row justify-content-end"> <!-- Alineamos todo el contenido a la derecha -->
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">
                Nueva Empresa
            </button> 
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#asignarModal">
                Asignar Compañía
            </button> <br><br>
        </div>
    </div>

    <div class="card">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Compañía</th>
                            <th scope="col">Nombre de la Empresa</th>
                            <th scope="col">Plan de Cuentas</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                            <tr>
                                <td>{{ $empresa->id }}</td>
                                <td>{{ $empresa->compania }}</td>
                                <td>{{ $empresa->nombre_empresa }}</td>
                                <td>{{ $empresa->plan_cuentas }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarEmpresaModal{{ $empresa->id }}">
                                        Editar
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarEmpresaModal{{ $empresa->id }}">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                        <label for="compania" class="form-label">Compañía</label>
                        <input type="text" class="form-control" id="compania" name="compania" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_empresa" class="form-label">Nombre de la Empresa</label>
                        <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" required>
                    </div>
                    <div class="mb-3">
                        <label for="plan_cuentas" class="form-label">Plan de Cuentas</label>
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

<!-- Modales de edición y eliminación -->
@foreach ($empresas as $empresa)
    <!-- Modal de Editar -->
    <div class="modal fade" id="editarEmpresaModal{{ $empresa->id }}" tabindex="-1" aria-labelledby="editarEmpresaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarEmpresaModalLabel">Editar Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> 
                <div class="modal-body">
                    <form method="POST" action="{{ route('empresa.update', $empresa->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editar_compania" class="form-label">Compañía</label>
                            <input type="text" class="form-control" id="editar_compania" name="editar_compania" value="{{ $empresa->compania }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="editar_nombre_empresa" class="form-label">Nombre de la Empresa</label>
                            <input type="text" class="form-control" id="editar_nombre_empresa" name="editar_nombre_empresa" value="{{ $empresa->nombre_empresa }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="editar_plan_cuentas" class="form-label">Plan de Cuentas</label>
                            <input type="text" class="form-control" id="editar_plan_cuentas" name="editar_plan_cuentas" value="{{ $empresa->plan_cuentas }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Eliminar -->
    <div class="modal fade" id="eliminarEmpresaModal{{ $empresa->id }}" tabindex="-1" aria-labelledby="eliminarEmpresaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarEmpresaModalLabel">Eliminar Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de eliminar esta empresa?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{ route('empresa.destroy', $empresa->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
