@extends('layouts.admin')

@section('content')

<div class="col-12 col-md-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Mantenimientos de Compañias</h4>
        </div>
    </div>
<div class="container">
  <div class="row">
    <div class="col-lg-2">
      <div class="card">
        <div class="card-body">
          <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center" role="tablist" aria-orientation="vertical">
              <button type="button" data-bs-toggle="modal" data-bs-target="#agregarModal" class="btn btn-info" id="custom-v-pills-home-tab" data-bs-toggle="pill" href="#custom-v-pills-home" role="tab" aria-controls="custom-v-pills-home" aria-selected="true">
                  <i class="ri-home-4-line d-block fs-20 mb-1"></i> Crear
              </button>
              <button type="button" data-bs-toggle="modal" data-bs-target="#" class="nav-link" id="custom-v-pills-messages-tab" data-bs-toggle="pill" href="#custom-v-pills-messages" role="tab" aria-controls="custom-v-pills-messages" aria-selected="false">
              <i class="ri-search-line d-block fs-20 mb-1"></i> Consultar
              </button>
              <button type="button" data-bs-toggle="modal" data-bs-target="#asignarModal" class="nav-link" id="custom-v-pills-profile-tab" data-bs-toggle="pill" href="#custom-v-pills-profile" role="tab" aria-controls="custom-v-pills-profile" aria-selected="false">
                  <i class="ri-user-2-line d-block fs-20 mb-1"></i> Asignar
              </button>
              <button type="button" data-bs-toggle="modal" data-bs-target="#listadoEmpresasModal" class="nav-link" id="custom-v-pills-messages-tab" data-bs-toggle="pill" href="#custom-v-pills-messages" role="tab" aria-controls="custom-v-pills-messages" aria-selected="false">
                  <i class="ri-file-list-3-line d-block fs-20 mb-1"></i> Usuarios
              </button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-10">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Compañia</th>
                  <th scope="col">Nombre de la Empresa</th>
                  <th scope="col">Plan de Cuentas</th>
                  <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $contador = 1;
                @endphp
                @foreach ($empresas as $empresa)
                <tr>
                  <td>{{ $contador }}</td>
                  <td>{{ $empresa->nombre_empresa }}</td>
                  <td>{{ str_pad($contador, 4, '0', STR_PAD_LEFT) }}</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarEmpresaModal{{ $empresa->id }}">
                          <i class="fas fa-edit"></i> Editar
                      </a>
                      <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarEmpresaModal{{ $empresa->id }}">
                          <i class="fas fa-trash-alt"></i> Eliminar
                      </a>
                  </td>
                </tr>
                @php
                    $contador++;
                @endphp
                @endforeach
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div> 
  </div> 
</div>

<!-- ESPACIO PARA CONSULTA RUC -->


<div class="container-fluid vh-100 d-flex align-items-center">
    <div class="card shadow mx-auto">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Consulta de DNI</h2>
        </div>
        <div class="card-body">
            <form action="#" method="get">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="dni" id="dni" required placeholder="Ingrese el DNI">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </div>
                </div>

                <h3 class="text-center mb-4">Resultado:</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="bg-white text-black">Número de DNI</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Nombre</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Apellido Paterno</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Apellido Materno</th>
                                <td></td>
                            </tr>
                        </table>
                    </div>

            <div class="text-center">
                    <a href="#" class="btn btn-primary">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ESPACIO PARA CONSULTA RUC -->

<!-- Modal de Agregar/Consultar empresa -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarModalLabel">Agregar Empresa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('empresa.store') }}" id="agregar-form">
          @csrf
          <div class="mb-3">
              <label for="nombre_empresa" class="form-label">Nombre de la Empresa</label>
              <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" required>
          </div>
          <!-- <div class="mb-3">
              <label for="plan_cuentas" class="forkm-label">Plan de Cuentas</label>
              <input type="text" class="form-control" id="plan_cuentas" name="plan_cuentas" required>
          </div> -->
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
                        <label for="usuario" class="form-label">Selecciona un usuario</label>
                        <select class="form-select" id="usuario" name="usuario" required>
                        <option value="" disabled selected>Selecciona un usuario</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="empresa" class="form-label">Selecciona una empresa</label>
                        <select class="form-select" id="empresa" name="empresa" required>
                            <option value="" disabled selected>Selecciona una empresa</option>
                            @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->nombre_empresa }}">{{ $empresa->nombre_empresa }}</option>
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
                        <label for="editar_nombre_empresa" class="form-label">Nombre de la Empresa</label>
                        <input type="text" class="form-control" id="editar_nombre_empresa" name="editar_nombre_empresa" value="{{ $empresa->nombre_empresa }}" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="editar_plan_cuentas" class="form-label">Plan de Cuentas</label>
                        <input type="text" class="form-control" id="editar_plan_cuentas" name="editar_plan_cuentas" value="{{ $empresa->plan_cuentas }}" required>
                    </div> -->
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

<!-- Modal de Listado de Empresas -->
<div class="modal fade" id="listadoEmpresasModal" tabindex="-1" aria-labelledby="listadoEmpresasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listadoEmpresasModalLabel">Listado de Usuarios Asignados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Empresa</th>
                                <!-- <th scope="col" class="text-end">Acciones</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personas as $persona)
                            <tr>
                                <td>{{ $persona->id }}</td>
                                <td>{{ $persona->usuario }}</td>
                                <td>{{ $persona->empresa }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#agregar-form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('empresa.store') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Empresa agregada con éxito',
                    }).then(function () {
                        setTimeout(function () {
                            $('#agregarModal').modal('hide');
                        }, 500);

                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    });

                },
                error: function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error al agregar la empresa',
                    });
                }
            });
        });
    });
</script>

@endsection
