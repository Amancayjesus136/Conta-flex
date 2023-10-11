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

<div class="col-12 col-md-12">
    <form action="{{route('tipo_cambio.store')}}" method="POST">
        @csrf
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <div class="row">
                <div class="col-12">
                    <input type="date" class="form-control mb-2" id="mes" name="fecha_creacion" aria-label="Mes" placeholder="Fecha de Creación" required>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="number" class="form-control mb-2" id="ano1" name="tipo_compra" aria-label="Año" placeholder="Compra..." required>
                </div>
                <div class="col-4">
                    <input type="number" class="form-control mb-2" id="ano2" name="tipo_venta" aria-label="Año" placeholder="Venta..." required>
                </div>
                <div class="col-4">
                    <select class="form-select form-select-sm mb-2" id="moneda" name="moneda" aria-label=".form-select-sm example" required>
                        <option value="" disabled selected>Seleccionar...</option>
                        <option value="Soles">Soles</option>
                        <option value="Dólares">Dólares</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Registrar <i class="fas fa-paper-plane"></i></button>
        </div>
    </form>
</div><br>

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
                <th scope="col">Tipo Cambio Compra</th>
                <th scope="col">Tipo Cambio Venta</th>
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
                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#">
                            <i class="ri-shopping-cart-2-fill"></i> 
                        </a>
                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#">
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
@endsection
