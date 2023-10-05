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
            <h4 class="mb-sm-0">Listado Ventas</h4>

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
                                    <th scope="col">Cod Compra</th>
                                    <th scope="col">Tipo Cambio</th>
                                    <th scope="col">Fecha Comprobante</th>
                                    <th scope="col">RUC</th>
                                    <th scope="col">Nombre Proveedor</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Factura Numero</th>
                                    <th scope="col">Fecha Emision</th>
                                    <th scope="col">Fecha Venta</th>
                                    <th scope="col">Base disponible</th>
                                    <th scope="col">IGV</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Tasa IGV</th>
                                    <th scope="col" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $contador = 1; @endphp
                                @foreach($reporteventas as $reporteventa)
                                    <tr>
                                        <td>{{ $contador }}</td>
                                        <td>{{ $reporteventa->cod_compra }}</td>
                                        <td>{{ $reporteventa->tipo_cambio }}</td>
                                        <td>{{ $reporteventa->fecha_comprobante }}</td>
                                        <td>{{ $reporteventa->ruc }}</td>
                                        <td>{{ $reporteventa->nombre_proveedor }}</td>
                                        <td>{{ $reporteventa->documento }}</td>
                                        <td>{{ $reporteventa->factura_numero }}</td>
                                        <td>{{ $reporteventa->fecha_emision }}</td>
                                        <td>{{ $reporteventa->fecha_venta }}</td>
                                        <td>{{ $reporteventa->base_disponible }}</td>
                                        <td>{{ $reporteventa->IGV }}</td>
                                        <td>{{ $reporteventa->total }}</td>
                                        <td>{{ $reporteventa->tasa_IGV }}</td>
                                        <td>
                                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editarSModal{{ $reporteventa->id }}">
                                            <i class="fas fa-edit"></i> ECXEL
                                        </a>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarSModal{{ $reporteventa->id }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#editarSModal{{ $reporteventa->id }}">
                                            <i class="fas fa-edit"></i> Eliminar
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
                    <form action="#" method="POST" id="reservation-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="trago" class="form-label">Cod Compra</label>
                                    <input type="text" class="form-control" id="cod_compra" name="cod_compra" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="trago" class="form-label">Tipo Cambio</label>
                                    <input type="text" class="form-control" id="tipo_cambio" name="tipo_cambio" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">Fecha Comprobante</label>
                                    <input type="number" class="form-control" id="fecha_comprobantes" name="fecha_comprobantes" required>
                                </div>
                            </div>+<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">RUC</label>
                                    <input type="number" class="form-control" id="ruc" name="ruc" required>
                                </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">Nombre Proveedor</label>
                                    <input type="number" class="form-control" id="nombre_proveedor" name="nombre_proveedor" required>
                                </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">Documento</label>
                                    <input type="number" class="form-control" id="documento" name="documento" required>
                                </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">Factura Numero</label>
                                    <input type="number" class="form-control" id="factura_numero" name="factura_numero" required>
                                </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">Fecha Emision</label>
                                    <input type="number" class="form-control" id="fecha_emision" name="fecha_emision" required>
                                </div>
                            </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">Fecha Venta</label>
                                    <input type="number" class="form-control" id="fecha_venta" name="fecha_venta" required>
                                </div>
                            </div> </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">Base disponible</label>
                                    <input type="number" class="form-control" id="base_disponible" name="base_disponible" required>
                                </div>
                            </div> </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">IGV</label>
                                    <input type="number" class="form-control" id="igv" name="igv" required>
                                </div>
                            </div> </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">Total</label>
                                    <input type="number" class="form-control" id="total" name="total" required>
                                </div>
                            </div> </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">Tasa IGV</label>
                                    <input type="number" class="form-control" id="tasa_igv" name="tasa_igv" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal para Crear Nuevo Tema -->

@foreach ($reporteventas as $reporteventa)
<!-- Modal de Editar -->
<div class="modal fade" id="editarModal{{ $reporteventa->id }}" tabindex="-1" aria-labelledby="editarTragoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarTragoModalLabel">Editar Trago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="trago" class="form-label">Ingrese el Nombre</label>
                                <input type="text" class="form-control" id="tragos" name="tragos" value=" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="precio_trago" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio_trago" name="precio_trago"  required>
                            </div>
                        </div>
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


<div class="modal fade" id="eliminarTragoModal" tabindex="-1" aria-labelledby="eliminarEmpresaModalLabel" aria-hidden="true">
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
                <form method="POST" action="#">
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

