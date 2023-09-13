@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-50 d-flex align-items-center">
    <div class="card shadow mx-auto">
        <div class="card-header bg-lg text-black">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Listado de Jefes y Sucursales</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearModal">
                    <i class="fas fa-plus-circle"></i> Agregar Nuevo Registro
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Jefe</th>
                            <th>Nombre Jefe</th>
                            <th>ID Sucursal</th>
                            <th>Nombre Sucursal</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Hora Apertura</th>
                            <th>Hora Cierre</th>
                            <th>Activo</th>
                            <th>ID Ciudad</th>
                            <th>Nombre Ciudad</th>
                            <th>País</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jefes as $jefe)
                            <tr>
                                <td>{{ $jefe->id_jefe }}</td>
                                <td>{{ $jefe->nombre }}</td>
                                <td>{{ $jefe->sucursal ? $jefe->sucursal->id_sucursal : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal ? $jefe->sucursal->nombre : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal ? $jefe->sucursal->direccion : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal ? $jefe->sucursal->telefono : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal ? $jefe->sucursal->email : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal ? $jefe->sucursal->hora_apertura : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal ? $jefe->sucursal->hora_cierre : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal ? ($jefe->sucursal->activo ? 'Sí' : 'No') : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal && $jefe->sucursal->ciudad ? $jefe->sucursal->ciudad->id_ciudad : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal && $jefe->sucursal->ciudad ? $jefe->sucursal->ciudad->nombre_ciudad : 'Sin sucursal' }}</td>
                                <td>{{ $jefe->sucursal && $jefe->sucursal->ciudad ? $jefe->sucursal->ciudad->nombre_pais : 'Sin sucursal' }}</td>

                                <td>
                                    <div class="btn-group">
                                    <!-- <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $jefe->id_jefe }}">
                                        <i class="fas fa-edit"></i>
                                    </button> -->

                                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $jefe->id_jefe }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('eliminar-jefe-sucursal', ['id' => $jefe->id_jefe]) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal de creación -->
<div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Agregar Nuevo Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('crear-jefe-sucursal') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Jefe</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <!-- Agrega más campos según necesidad -->
                    <div class="mb-3">
                        <label for="nombre_sucursal" class="form-label">Nombre Sucursal</label>
                        <input type="text" class="form-control" id="nombre_sucursal" name="nombre_sucursal" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="hora_apertura" class="form-label">Hora Apertura</label>
                        <input type="time" class="form-control" id="hora_apertura" name="hora_apertura" required>
                    </div>
                    <div class="mb-3">
                        <label for="hora_cierre" class="form-label">Hora Cierre</label>
                        <input type="time" class="form-control" id="hora_cierre" name="hora_cierre" required>
                    </div>
                    <div class="mb-3">
                        <label for="activo" class="form-label">Activo</label>
                        <select class="form-control" id="activo" name="activo" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_ciudad" class="form-label">Nombre Ciudad</label>
                        <input type="text" class="form-control" id="nombre_ciudad" name="nombre_ciudad" required>
                    </div>
                    <div class="mb-3">
                        <label for="pais" class="form-label">País</label>
                        <input type="text" class="form-control" id="pais" name="pais" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Registro</button>
                </form>
            </div>
        </div>
    </div>
</div>

                            <!-- Modal de detalles -->
                            <div class="modal fade" id="detallesModal{{ $jefe->id_jefe }}" tabindex="-1" aria-labelledby="detallesModalLabel{{ $jefe->id_jefe }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detallesModalLabel{{ $jefe->id_jefe }}">Detalles de Jefe y Sucursal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>ID Jefe: {{ $jefe->id_jefe }}</p>
                                            <p>Nombre Jefe: {{ $jefe->nombre }}</p>
                                            <!-- Agrega más detalles aquí según necesidad -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="editarModal{{ $jefe->id_jefe }}" tabindex="-1" aria-labelledby="editarModalLabel{{ $jefe->id_jefe }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel{{ $jefe->id_jefe }}">Editar Jefe y Sucursal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('actualizar-jefe-sucursal', ['id' => $jefe->id_jefe]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre Jefe</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $jefe->nombre }}" required>
    </div>
    <div class="mb-3">
    <label for="nombre_sucursal" class="form-label">Nombre Sucursal</label>
    <input type="text" class="form-control" id="nombre_sucursal" name="nombre_sucursal" value="{{ $jefe->sucursal ? $jefe->sucursal->nombre : '' }}" required>
</div>
<div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $jefe->sucursal ? $jefe->sucursal->direccion : '' }}" required>
</div>

    <div class="mb-3">
    <label for="telefono" class="form-label">Teléfono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $jefe->sucursal ? $jefe->sucursal->telefono : '' }}" required>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $jefe->sucursal ? $jefe->sucursal->email : '' }}" required>
</div>
<div class="mb-3">
    <label for="hora_apertura" class="form-label">Hora Apertura</label>
    <input type="time" class="form-control" id="hora_apertura" name="hora_apertura" value="{{ $jefe->sucursal ? $jefe->sucursal->hora_apertura : '' }}" required>
</div>
<div class="mb-3">
    <label for="hora_cierre" class="form-label">Hora Cierre</label>
    <input type="time" class="form-control" id="hora_cierre" name="hora_cierre" value="{{ $jefe->sucursal ? $jefe->sucursal->hora_cierre : '' }}" required>
</div>
<div class="mb-3">
    <label for="activo" class="form-label">Activo</label>
    <select class="form-control" id="activo" name="activo" required>
        <option value="1" {{ $jefe->sucursal && $jefe->sucursal->activo ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ $jefe->sucursal && !$jefe->sucursal->activo ? 'selected' : '' }}>No</option>
    </select>
</div>
<div class="mb-3">
    <label for="nombre_ciudad" class="form-label">Nombre ciudad</label>
    <input type="text" class="form-control" id="nombre_ciudad" name="nombre_ciudad" value="{{ $jefe->sucursal && $jefe->sucursal->ciudad ? $jefe->sucursal->ciudad->nombre_ciudad : '' }}" required>
</div>
<div class="mb-3">
    <label for="pais" class="form-label">País</label>
    <input type="text" class="form-control" id="pais" name="pais" value="{{ $jefe->sucursal && $jefe->sucursal->ciudad ? $jefe->sucursal->ciudad->nombre_pais : '' }}" required>
</div>


    <!-- Agregar más campos de edición según necesidad -->
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
