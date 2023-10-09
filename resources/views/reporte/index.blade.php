@extends('layouts.admin')

@section('content')
<style>
    .listado-busqueda {
  width: 240px;
  float: right;
}
.listado-busqueda input {
  width: calc(100% - 70px);
  display: inline-block;
}


</style>

<!-- cabecera -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Listado reporte</h4>

            <div class="page-title-right">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"></h4>
                <form method="GET" class="listado-busqueda">
                    <input type="text" placeholder="Ingrese su búsqueda" name="s" class="form-control input-sm"
                        value="<?php if (!empty($_GET['s'])) echo $_GET['s']; ?>" />
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#agregarModal">
                    <i class="fas fa-plus-circle"></i> Nuevo Registro
                </a>
            </div>
            </div>

        </div>
    </div>
</div>
<!-- cabecera -->

<!-- listado -->
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Cod Venta</th>
                                    <th scope="col">Tipo Cambio</th>
                                    <th scope="col">Fecha Comprobante</th>
                                    <th scope="col">RUC</th>
                                    <th scope="col">Nombre Proveedor</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Factura Numero</th>
                                    <th scope="col">Fecha Emision</th>
                                    <th scope="col">Fecha Compra</th>
                                    <th scope="col">Base disponible</th>
                                    <th scope="col">IGV</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Tasa IGV</th>
                                    <th scope="col" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- FILAS DE LA TABLA -->
                                @php $contador = 1; @endphp
                                @foreach($reportecompras as $reportecompra)
                                    <tr>
                                    <td>{{ $contador }}</td>
                                        <td>{{ $reportecompra->cod_compra}}</td>
                                        <td>{{ $reportecompra->tipo_cambio }}</td>
                                        <td>{{ $reportecompra->fecha_comprobante }}</td>
                                        <td>{{ $reportecompra->ruc }}</td>
                                        <td>{{ $reportecompra->nombre_proveedor }}</td>
                                        <td>{{ $reportecompra->documento }}</td>
                                        <td>{{ $reportecompra->factura_numero }}</td>
                                        <td>{{ $reportecompra->fecha_emision }}</td>
                                        <td>{{ $reportecompra->fecha_compra }}</td>
                                        <td>{{ $reportecompra->base_disponible }}</td>
                                        <td>{{ $reportecompra->IGV }}</td>
                                        <td>{{ $reportecompra->total }}</td>
                                        <td>{{ $reportecompra->tasa_IGV }}</td>
                                        <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $reportecompra->id }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarTragoModal{{ $reportecompra->id }}">
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
<!-- listado -->


<!-- Modal para Crear Nuevo Tema -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear nuevo registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('reporte_compras.store')}}" method="POST" id="reservation-form">
                        @csrf
                        <div class="border">
                            <ul class="nav nav-pills custom-hover-nav-tabs">
                                <li class="nav-item">
                                    <a href="#datos" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <i class="ri-user-fill nav-icon nav-tab-position"></i>
                                        <h5 class="nav-title nav-tab-position m-0"></h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#facturacion" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="ri-file-text-line nav-icon nav-tab-position"></i>
                                        <h5 class="nav-title nav-tab-position m-0"></h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#fechas" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="ri-calendar-line nav-icon nav-tab-position"></i>
                                        <h5 class="nav-title nav-tab-position m-0"></h5>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="datos">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><br>
                                            <label for="ruc">RUC</label>
                                            <input type="text" class="form-control" name="ruc" id="ruc" required
                                                placeholder="Ingrese el Documento">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group"><br>
                                            <label for="nombre_proveedor">Nombre del Proveedor</label>
                                            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="facturacion">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><br>
                                            <label for="cod_compra">Cod Compra</label>
                                            <select class="form-select rounded-pill mb-3" aria-label="cod_venta" id="cod_compra" name="cod_compra">
                                                <option selected>Seleccionar moneda...</option>
                                                <option value="soles">Soles</option>
                                                <option value="dolares">Dólares</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><br>
                                            <label for="tipo_cambio">Tipo de Cambio</label>
                                            <input type="number" class="form-control" id="tipo_cambio" name="tipo_cambio">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><br>
                                            <label for="documento">Documento</label>
                                            <input type="number" class="form-control" id="tipo_cambio" name="documento">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><br>
                                            <label for="factura_numero">Factura número</label>
                                            <input type="number" class="form-control" id="factura_numero" name="factura_numero">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group"><br>
                                            <label for="base_disponible">Base Dis</label>
                                            <input type="number" class="form-control" id="base_disponible" name="base_disponible">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><br>
                                            <label for="tasa_IGV">Tasa de IGV</label>
                                            <input type="number" class="form-control" id="tasa_IGV" name="tasa_IGV">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><br>
                                            <label for="IGV">IGV</label>
                                            <input type="number" class="form-control" id="IGV" name="IGV">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><br>
                                            <label for="total">Total</label>
                                            <input type="number" class="form-control" id="total" name="total">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="fechas">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><br>
                                            <label for="fecha_comprobante">Fecha Comprobante</label>
                                            <input type="date" class="form-control" id="fecha_comprobante"
                                                name="fecha_comprobante">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><br>
                                            <label for="fecha_emision">Fecha de Emisión</label>
                                            <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><br>
                                            <label for="fecha_venta">Fecha de Compra</label>
                                            <input type="date" class="form-control" id="fecha_venta" name="fecha_compra">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal para Crear Nuevo Tema -->

@foreach ($reportecompras as $reportecompra)
<!-- Modal de Editar -->
<div class="modal fade custom-accordion" id="editarModal{{ $reportecompra->id }}" tabindex="-1" aria-labelledby="editarTragoModalLabel{{ $reportecompra->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarTragoModalLabel{{ $reportecompra->id }}">Editar Compras</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('reporte_compras.update', $reportecompra->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="accordion" id="accordion{{ $reportecompra->id }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="datosHeading{{ $reportecompra->id }}">
                                <button class="accordion-button bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#datosCollapse{{ $reportecompra->id }}" aria-expanded="true" aria-controls="datosCollapse{{ $reportecompra->id }}">
                                    Datos
                                </button>
                            </h2>
                            <div id="datosCollapse{{ $reportecompra->id }}" class="accordion-collapse collapse show" aria-labelledby="datosHeading{{ $reportecompra->id }}" data-bs-parent="#accordion{{ $reportecompra->id }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ruc">RUC</label>
                                                <input type="text" class="form-control" name="ruc" id="ruc" value="{{ $reportecompra->ruc }}" required placeholder="Ingrese el Documento">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre_proveedor">Nombre del Proveedor</label>
                                                <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="{{ $reportecompra->nombre_proveedor }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="facturacionHeading{{ $reportecompra->id }}">
                                <button class="accordion-button collapsed bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#facturacionCollapse{{ $reportecompra->id }}" aria-expanded="false" aria-controls="facturacionCollapse{{ $reportecompra->id }}">
                                    Facturación
                                </button>
                            </h2>
                            <div id="facturacionCollapse{{ $reportecompra->id }}" class="accordion-collapse collapse" aria-labelledby="facturacionHeading{{ $reportecompra->id }}" data-bs-parent="#accordion{{ $reportecompra->id }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cod_compra">Cod Compra</label>
                                                <select class="form-select rounded-pill mb-3" aria-label="cod_compra" id="cod_compra" name="cod_compra" required>
                                                    <option value="soles" {{ $reportecompra->cod_compra == 'soles' ? 'selected' : '' }}>Soles</option>
                                                    <option value="dolares" {{ $reportecompra->cod_compra == 'dolares' ? 'selected' : '' }}>Dólares</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tipo_cambio">Tipo de Cambio</label>
                                                <input type="number" class="form-control" id="tipo_cambio" name="tipo_cambio" value="{{ $reportecompra->tipo_cambio }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="documento">Documento</label>
                                                <input type="number" class="form-control" id="documento" name="documento" value="{{ $reportecompra->documento }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="factura_numero">Factura número</label>
                                                <input type="number" class="form-control" id="factura_numero" name="factura_numero" value="{{ $reportecompra->factura_numero }}" required>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="base_disponible">Base Disp</label>
                                                <input type="number" class="form-control" id="base_disponible" name="base_disponible" value="{{ $reportecompra->base_disponible }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="tasa_IGV">Tasa de IGV</label>
                                                <input type="number" class="form-control" id="tasa_IGV" name="tasa_IGV" value="{{ $reportecompra->tasa_IGV }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="IGV">IGV</label>
                                                <input type="number" class="form-control" id="IGV" name="IGV" value="{{ $reportecompra->IGV }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="total">Total</label>
                                                <input type="number" class="form-control" id="total" name="total" value="{{ $reportecompra->total }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="fechasHeading{{ $reportecompra->id }}">
                                <button class="accordion-button collapsed bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#fechasCollapse{{ $reportecompra->id }}" aria-expanded="false" aria-controls="fechasCollapse{{ $reportecompra->id }}">
                                    Fechas
                                </button>
                            </h2>
                            <div id="fechasCollapse{{ $reportecompra->id }}" class="accordion-collapse collapse" aria-labelledby="fechasHeading{{ $reportecompra->id }}" data-bs-parent="#accordion{{ $reportecompra->id }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_comprobante">Fecha Comp</label>
                                                <input type="date" class="form-control" id="fecha_comprobante" name="fecha_comprobante" value="{{ $reportecompra->fecha_comprobante }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_emision">Fecha de Emisión</label>
                                                <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" value="{{ $reportecompra->fecha_emision }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_compra">Fecha de Compra</label>
                                                <input type="date" class="form-control" id="fecha_compra" name="fecha_compra" value="{{ $reportecompra->fecha_compra }}" required>
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

@foreach ($reportecompras as $reportecompra)
<div class="modal fade" id="eliminarTragoModal{{ $reportecompra->id }}" tabindex="-1" aria-labelledby="eliminarEmpresaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarTracoModalLabel">Eliminar Trago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de eliminar esta empresa?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{ route('reporte_compras.destroy', $reportecompra->id) }}">
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
