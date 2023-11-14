@extends('layouts.admin')

@section('content')
<style>
  /* Estilo para el select más grande */
  #moneda {
    width: 150px;
    height: 36px; 
    font-size: 13px;
  }
</style>

<!-- cabecera -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <div class="form-group">
                <h4 class="mb-sm-0">Mantenimientos de Compañias</h4>
            </div>

            <div class="page-title-right">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"></h4>
                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#agregarModal">
                        <i class="fas fa-plus-circle"></i> Nuevo Registro
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- cabecera -->

<!-- Modal de Agregar -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarModalLabel">Agregar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('tipo_cambio.store') }}" id="agregar-form">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="tipo_compra" class="form-label">Tipo Compra</label>
                                <select class="form-select" id="tipo_compra" name="tipo_compra" required>
                                    <option value="" disabled selected>Selecciona compra</option>
                                    @if ($ultimoRegistro)
                                        <option value="{{ $ultimoRegistro->compra }}">{{ $ultimoRegistro->compra }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="tipo_venta" class="form-label">Tipo Venta</label>
                                <select class="form-select" id="tipo_venta" name="tipo_venta" required>
                                    <option value="" disabled selected>Selecciona venta</option>
                                    @if ($ultimoRegistro)
                                        <option value="{{ $ultimoRegistro2->venta }}">{{ $ultimoRegistro2->venta }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="fecha_creacion" class="form-label">Fecha Creación</label>
                                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="fecha_creacion" class="form-label">Tipo de moneda</label>
                            <select class="form-select" id="moneda" name="moneda" aria-label=".form-select-sm example" required>
                                <option value="" disabled selected>Seleccionar...</option>
                                <option value="Soles">Soles</option>
                                <option value="Dólares">Dólares</option>
                            </select>
                        </div>
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
<!-- Modal de Agregar -->

<div class="table-responsive table-card">
    <table class="table table-nowrap table-striped-columns mb-0">
        <thead class="table-light">
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <label class="form-check-label" for="cardtableCheck"></label>
                    </div>
                </th>
                <th scope="col">#</th>
                <th scope="col">Moneda</th>
                <th scope="col">Tipo Compra</th>
                <th scope="col">Tipo Venta</th>
                <th scope="col">Fecha Creación</th>
                <th scope="col">Acciones</th>   
            </tr>
        </thead>
        <tbody>
            <tr>
                @php $contador = 1; @endphp
                @foreach($tipocambios as $tipocambio)
                    <tr>
                    <td>
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cardtableCheck03">
                                <label class="form-check-label" for="cardtableCheck03"></label>
                            </div>
                        </td>
                        <td>{{ $contador }}</td>
                        <td>{{ $tipocambio->moneda }}</td>
                        <td>{{ $tipocambio->tipo_compra }}</td>
                        <td>{{ $tipocambio->tipo_venta }}</td>
                        <td>{{ $tipocambio->fecha_creacion }}</td>
                        <td>
                        <a href="{{route('compras.index')}}" class="btn btn-warning btn-sm">
                            <i class="ri-shopping-cart-2-fill"></i> 
                        </a>
                        <a href="{{route('ventas.index')}}" class="btn btn-success btn-sm">
                            <i class="ri-shopping-bag-3-fill"></i> 
                        </a>
                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $tipocambio->id }}">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarTragoModal{{ $tipocambio->id}}">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                    @php 
                        $contador++; 
                    @endphp
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

@foreach ($tipocambios as $tipocambio)
<!-- Modal de Editar -->
<div class="modal fade custom-accordion" id="editarModal{{ $tipocambio->id }}" tabindex="-1" aria-labelledby="editarTragoModalLabel{{ $tipocambio->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarTragoModalLabel{{ $tipocambio->id }}">Editar Ventas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('tipo_cambio.update', $tipocambio->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="accordion" id="accordion{{ $tipocambio->id }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="datosHeading{{ $tipocambio->id }}">
                                <button class="accordion-button bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#datosCollapse{{ $tipocambio->id }}" aria-expanded="true" aria-controls="datosCollapse{{ $tipocambio->id }}">
                                    Tipo de Cambio
                                </button>
                            </h2>
                            <div id="datosCollapse{{ $tipocambio->id }}" class="accordion-collapse collapse show" aria-labelledby="datosHeading{{ $tipocambio->id }}" data-bs-parent="#accordion{{ $tipocambio->id }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tipo_compra">Tipo de Compra</label>
                                                <input type="number" class="form-control" name="tipo_compra" id="tipo_compra" value="{{ $tipocambio->tipo_compra }}" required placeholder="Ingrese el Documento">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tipo_venta">Tipo de Venta</label>
                                                <input type="number" class="form-control" id="tipo_venta" name="tipo_venta" value="{{ $tipocambio->tipo_venta }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="facturacionHeading{{ $tipocambio->id }}">
                                <button class="accordion-button collapsed bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#facturacionCollapse{{ $tipocambio->id }}" aria-expanded="false" aria-controls="facturacionCollapse{{ $tipocambio->id }}">
                                    Fecha
                                </button>
                            </h2>
                            <div id="facturacionCollapse{{ $tipocambio->id }}" class="accordion-collapse collapse" aria-labelledby="facturacionHeading{{ $tipocambio->id }}" data-bs-parent="#accordion{{ $tipocambio->id }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="moneda">Moneda</label>
                                                <select class="form-select rounded-pill mb-3" aria-label="moneda" id="moneda" name="moneda" required>
                                                    <option value="soles" {{ $tipocambio->cod_compra == 'soles' ? 'selected' : '' }}>Soles</option>
                                                    <option value="dolares" {{ $tipocambio->cod_compra == 'dolares' ? 'selected' : '' }}>Dólares</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fecha_creacion">Fecha de Creación</label>
                                                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{ $tipocambio->fecha_creacion }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($tipocambios as $tipocambio)
<div class="modal fade" id="eliminarTragoModal{{ $tipocambio->id }}" tabindex="-1" aria-labelledby="eliminarEmpresaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarTracoModalLabel">Eliminar Tipo de Cambio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de eliminar esta empresa?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{ route('tipo_cambio.destroy', $tipocambio->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#agregar-form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('tipo_cambio.store') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Tipo Cambio registrado con éxito',
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