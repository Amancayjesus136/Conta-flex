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
        <a href="{{ route('reporte_compras.index', ['export' => 1]) }}" class="btn btn-success btn-sm">
            <i class="fas fa-file-excel"></i>  Excel
        </a>

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

<<!-- listado -->
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
                            <th scope="col" style="width: 150px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reportescompras as $index => $reportecompra)
                            <tr>
                                <td>{{ ($reportescompras->currentPage() - 1) * $reportescompras->perPage() + $index + 1 }}</td>
                                <td>{{ $reportecompra->cod_compra }}</td>
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
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $reportecompra->id }}">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarTragoModal{{ $reportecompra->id }}">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- pagination  -->
    <div style="margin-top: 20px; margin-bottom: 20px" class="d-flex justify-content-between">
        <p style="margin-left: 50px" class="text-start">Mostrando {{ $reportescompras->firstItem() }} a {{ $reportescompras->lastItem() }} de {{ $reportescompras->total() }} resultados</p>

        <div style="margin-right: 50px" class="pagination-container">
            <ul class="pagination">
                @if ($reportescompras->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Anterior</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $reportescompras->previousPageUrl() }}">Anterior</a></li>
                @endif

                @for ($i = 1; $i <= $reportescompras->lastPage(); $i++)
                    <li class="page-item {{ $i == $reportescompras->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $reportescompras->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($reportescompras->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $reportescompras->nextPageUrl() }}">Siguiente</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- pagination  -->
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
                            <input type="text" class="form-control" id="tipo_cambio" name="tipo_cambio" step="any">
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
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="base_disponible">Base Imp</label>
                            <input type="number" class="form-control" id="base_disponible" name="base_disponible">
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group"><br>
                          <label for="IGV">IGV</label>
                          <select class="form-control" id="IGV" name="IGV">
                              <option value="18">IGV</option>
                              <option value="1.18">IGV INCLUIDO</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="total">Total</label>
                            <input type="number" class="form-control" id="total" name="total" step="any">
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
                            <label for="fecha_compra">Fecha de Compra</label>
                            <input type="date" class="form-control" id="fecha_compra" name="fecha_compra">
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

@foreach ($reportescompras as $reportecompra)
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
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="base_disponible">Base Disp</label>
                                      <input type="number" class="form-control" id="base_disponible" name="base_disponible" value="{{ $reportecompra->base_disponible }}" required>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="IGV">IGV</label>
                                      <input type="number" class="form-control" id="IGV" name="IGV" value="{{ $reportecompra->IGV }}" required>
                                  </div>
                              </div>
                              <div class="col-md-4">
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

@foreach ($reportescompras as $reportecompra)
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

<script>
    // Obtener elementos del DOM
    const igvSelect = document.getElementById('IGV');
    const baseDisponibleInput = document.getElementById('base_disponible');
    const totalInput = document.getElementById('total');

    // Agregar un evento de cambio al select
    igvSelect.addEventListener('change', calcularTotal);
    
    // Agregar un evento de entrada al campo "base_disponible"
    baseDisponibleInput.addEventListener('input', calcularTotal);

    // Función para calcular el total
    function calcularTotal() {
        const selectedValue = parseFloat(igvSelect.value);
        const baseDisponible = parseFloat(baseDisponibleInput.value);
        let result;

        if (isNaN(baseDisponible)) {
            // Si el usuario no ingresó un número en "base_disponible", el total se establece en 0
            result = 0;
        } else if (selectedValue === 18) {
            // Si se selecciona "IGV" (valor 18), realizar el cálculo
            result = baseDisponible * 0.18;
        } else if (selectedValue === 1.18) {
            // Si se selecciona "IGV INCLUIDO" (valor 1.18), realizar el cálculo
            result = (baseDisponible / 1.18) * 0.18;
        } else {
            // Manejar otras opciones aquí
            result = 0; // Otra opción
        }

        // Mostrar el resultado en el campo "total"
        totalInput.value = result.toFixed(2); // Redondear a 2 decimales
    }
</script>

<!-- <script>
    // Obtiene los elementos de los campos de entrada
    var baseInput = document.getElementById('base_disponible');
    var igvInput = document.getElementById('IGV');
    var totalInput = document.getElementById('total');

    // Agrega un evento de escucha para detectar cambios en base_disponible
    baseInput.addEventListener('input', calcularTotal);

    // Función para calcular el total
    function calcularTotal() {
        // Obtiene el valor del campo de entrada de base imponible
        var base = parseFloat(baseInput.value) || 0; // Si no se ingresa un número, se asume 0

        // Calcula el IGV (18% de la Base Imponible)
        var igvPorcentaje = 0.18; // 18% en forma decimal
        var igv = base * igvPorcentaje;

        // Calcula el total sumando la Base Imponible y el IGV
        var total = base + igv;

        // Actualiza el valor del campo Total
        totalInput.value = total.toFixed(2); // Limita el resultado del total a dos decimales
    }
</script> -->
@endsection

