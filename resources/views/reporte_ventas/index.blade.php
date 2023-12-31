@extends('layouts.admin')

@section('content')
<style>

</style>

<!-- cabecera -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <div class="form-group">
                <a href="{{ route('reporte_ventas.index', ['export' => 1]) }}" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel"></i>  Excel
                </a>
            </div>


            <div class="page-title-right">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"></h4>
                <form method="GET" class="listado-busqueda">
                    <input type="text" placeholder="Ingrese su búsqueda" name="s" class="form-control input-sm"
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
                                <th scope="col">Moneda</th>
                                <th scope="col">T. Cambio</th>
                                <th scope="col">F. Comprobante</th>
                                <th scope="col">RUC</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Documento</th>
                                <th scope="col">F. Numero</th>
                                <th scope="col">F. Emision</th>
                                <th scope="col">F. Venta</th>
                                <th scope="col">Base</th>
                                <th scope="col">IGV</th>
                                <th scope="col">Total</th>
                                <th scope="col" style="width: 150px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($reporteventas && count($reporteventas) > 0)
                                @php
                                    $sumBase = 0;
                                    $sumIGV = 0;
                                    $sumTotal = 0;
                                @endphp
                                @foreach($reporteventas as $index => $reporteventa)
                                    <tr>
                                        <td>{{ ($reporteventas->currentPage() - 1) * $reporteventas->perPage() + $index + 1 }}</td>
                                        <td>{{ $reporteventa->cod_venta }}</td>
                                        <td>{{ $reporteventa->tipo_cambio }}</td>
                                        <td>{{ $reporteventa->fecha_comprobante }}</td>
                                        <td>{{ $reporteventa->ruc }}</td>
                                        <td>{{ $reporteventa->nombre }}</td>
                                        <td>{{ $reporteventa->documento }}</td>
                                        <td>{{ $reporteventa->factura_numero }}</td>
                                        <td>{{ $reporteventa->fecha_emision }}</td>
                                        <td>{{ $reporteventa->fecha_venta }}</td>
                                        <td>{{ $reporteventa->base_disponible }}</td>
                                        <td>{{ $reporteventa->IGV }}</td>
                                        <td>{{ $reporteventa->total }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $reporteventa->id }}">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarTragoModal{{ $reporteventa->id }}">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $sumBase += $reporteventa->base_disponible;
                                        $sumIGV += $reporteventa->IGV;
                                        $sumTotal += $reporteventa->total;
                                    @endphp
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="14">No se encontraron ventas</td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot class="table-light">
                            @if ($reporteventas && count($reporteventas) > 0)
                                <tr>
                                    <td colspan="10">Total</td>
                                    <td>${{ number_format($sumBase, 2, '.', '') }}</td>
                                    <td>${{ number_format($sumIGV, 2, '.', '') }}</td>
                                    <td>${{ number_format($sumTotal, 2, '.', '') }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="14">
                                        <form method="POST" action="{{ route('compras.store2') }}">
                                            @csrf
                                            <!-- Aquí puedes incluir tus inputs ocultos si los necesitas -->
                                            <button type="submit" class="btn btn-primary">Enviar a Liquidaciones</button>
                                        </form>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="text-center" colspan="14"></td>
                                </tr>
                            @endif
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div>
            <!-- pagination  -->
            <div style="margin-top: 20px; margin-bottom: 20px" class="d-flex justify-content-between">
                <p style="margin-left: 50px" class="text-start">Mostrando {{ $reporteventas->firstItem() }} a {{ $reporteventas->lastItem() }} de {{ $reporteventas->total() }} resultados</p>

                <div style="margin-right: 50px" class="pagination-container">
                    <ul class="pagination">
                        @if ($reporteventas->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Anterior</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $reporteventas->previousPageUrl() }}">Anterior</a></li>
                        @endif

                        @for ($i = 1; $i <= $reporteventas->lastPage(); $i++)
                            <li class="page-item {{ $i == $reporteventas->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $reporteventas->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($reporteventas->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $reporteventas->nextPageUrl() }}">Siguiente</a></li>
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
            <form action="{{route('reporte_ventas.store')}}" method="POST" id="reservation-form">
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
                                <label for="cod_compra">Cod Venta</label>
                                <select class="form-select rounded-pill mb-3" aria-label="cod_venta" id="cod_venta" name="cod_venta">
                                    <option selected>Seleccionar moneda...</option>
                                    <option value="soles">Soles</option>
                                    <option value="dolares">Dólares</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><br>
                                <label for="tipo_cambio">Tipo de Cambio</label>
                                <input type="number" class="form-control" id="tipo_cambio" name="tipo_cambio" step="any">
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
                        </div><br><br>
                        <div class="col-md-3">
                            <div class="form-group"><br>
                                <label for="consulta">Tipo <span style="color: red; font-size: 15px;">*</span></label>
                                <select class="form-select mb-3" aria-label=".form-select-lg example" id="consultaSelect" required onchange="seleccionarTipo()">
                                    <option value="">Selecciona el tipo...</option>
                                    <option value="1">IGV INCLUIDO</option>
                                    <option value="2">IGV</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group"><br>
                                <label for="base_disponible">Base</label>
                                <input type="text" class="form-control" id="base_disponible" name="base_disponible">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group"><br>
                                <label for="igv">IGV</label>
                                <input type="text" class="form-control" id="igv" name="IGV">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group"><br>
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" name="total">
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
                                <label for="fecha_venta">Fecha de venta</label>
                                <input type="date" class="form-control" id="fecha_venta" name="fecha_venta">
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

@foreach ($reporteventas as $reporteventa)
<!-- Modal de Editar -->
<div class="modal fade custom-accordion" id="editarModal{{ $reporteventa->id }}" tabindex="-1" aria-labelledby="editarTragoModalLabel{{ $reporteventa->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarTragoModalLabel{{ $reporteventa->id }}">Editar Ventas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('reporte_ventas.update', $reporteventa->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="accordion" id="accordion{{ $reporteventa->id }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="datosHeading{{ $reporteventa->id }}">
                                <button class="accordion-button bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#datosCollapse{{ $reporteventa->id }}" aria-expanded="true" aria-controls="datosCollapse{{ $reporteventa->id }}">
                                    Datos
                                </button>
                            </h2>
                            <div id="datosCollapse{{ $reporteventa->id }}" class="accordion-collapse collapse show" aria-labelledby="datosHeading{{ $reporteventa->id }}" data-bs-parent="#accordion{{ $reporteventa->id }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ruc">RUC</label>
                                                <input type="text" class="form-control" name="ruc" id="ruc" value="{{ $reporteventa->ruc }}" required placeholder="Ingrese el Documento">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre_proveedor">Nombre del Proveedor</label>
                                                <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="{{ $reporteventa->nombre_proveedor }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="facturacionHeading{{ $reporteventa->id }}">
                                <button class="accordion-button collapsed bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#facturacionCollapse{{ $reporteventa->id }}" aria-expanded="false" aria-controls="facturacionCollapse{{ $reporteventa->id }}">
                                    Facturación
                                </button>
                            </h2>
                            <div id="facturacionCollapse{{ $reporteventa->id }}" class="accordion-collapse collapse" aria-labelledby="facturacionHeading{{ $reporteventa->id }}" data-bs-parent="#accordion{{ $reporteventa->id }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cod_venta">Cod Venta</label>
                                                <select class="form-select rounded-pill mb-3" aria-label="cod_venta" id="cod_venta" name="cod_venta" required>
                                                    <option value="soles" {{ $reporteventa->cod_compra == 'soles' ? 'selected' : '' }}>Soles</option>
                                                    <option value="dolares" {{ $reporteventa->cod_compra == 'dolares' ? 'selected' : '' }}>Dólares</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tipo_cambio">Tipo de Cambio</label>
                                                <input type="number" class="form-control" id="tipo_cambio" name="tipo_cambio" value="{{ $reporteventa->tipo_cambio }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="documento">Documento</label>
                                                <input type="number" class="form-control" id="documento" name="documento" value="{{ $reporteventa->documento }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="factura_numero">Factura número</label>
                                                <input type="number" class="form-control" id="factura_numero" name="factura_numero" value="{{ $reporteventa->factura_numero }}" required>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="base_disponible">Base Disp</label>
                                                <input type="number" class="form-control" id="base_disponible" name="base_disponible" value="{{ $reporteventa->base_disponible }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="IGV">IGV</label>
                                                <input type="number" class="form-control" id="IGV" name="IGV" value="{{ $reporteventa->IGV }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="total">Total</label>
                                                <input type="number" class="form-control" id="total" name="total" value="{{ $reporteventa->total }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="fechasHeading{{ $reporteventa->id }}">
                                <button class="accordion-button collapsed bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#fechasCollapse{{ $reporteventa->id }}" aria-expanded="false" aria-controls="fechasCollapse{{ $reporteventa->id }}">
                                    Fechas
                                </button>
                            </h2>
                            <div id="fechasCollapse{{ $reporteventa->id }}" class="accordion-collapse collapse" aria-labelledby="fechasHeading{{ $reporteventa->id }}" data-bs-parent="#accordion{{ $reporteventa->id }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_comprobante">Fecha Comp</label>
                                                <input type="date" class="form-control" id="fecha_comprobante" name="fecha_comprobante" value="{{ $reporteventa->fecha_comprobante }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_emision">Fecha de Emisión</label>
                                                <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" value="{{ $reporteventa->fecha_emision }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_venta">Fecha de Venta</label>
                                                <input type="date" class="form-control" id="fecha_venta" name="fecha_venta" value="{{ $reporteventa->fecha_venta }}" required>
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

@foreach ($reporteventas as $reporteventa)
<div class="modal fade" id="eliminarTragoModal{{ $reporteventa->id }}" tabindex="-1" aria-labelledby="eliminarEmpresaModalLabel" aria-hidden="true">
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
                <form method="POST" action="{{ route('reporte_ventas.destroy', $reporteventa->id) }}">
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
    function calcularTotal() {
        var tipoConsulta = document.getElementById("consultaSelect").value;
        var baseImponible = parseFloat(document.getElementById("base_disponible").value);
        var igv = 0;
        var total = 0;

        if (tipoConsulta === "1") { 
            total = baseImponible;
            igv = total / 1.18 * 0.18;
        } else if (tipoConsulta === "2") { 
            igv = baseImponible * 0.18;
            total = baseImponible + igv;
        }

        document.getElementById("igv").value = igv.toFixed(2);
        document.getElementById("total").value = total.toFixed(2);
    }
</script>

<script>
    document.getElementById("consultaSelect").addEventListener("change", function() {
        calcularIGVIncluido();
    });

    document.getElementById("total").addEventListener("input", function() {
        calcularIGVIncluido();
    });

    function calcularIGVIncluido() {
        var total = parseFloat(document.getElementById("total").value) || 0;
        var igvSelect = document.getElementById("consultaSelect").value;
        var baseImponible = 0;
        var igv = 0;

        if (igvSelect === "1") {
            baseImponible = total / 1.18; 
            igv = total - baseImponible;
        }

        document.getElementById("base_disponible").value = baseImponible.toFixed(2);
        document.getElementById("igv").value = igv.toFixed(2);
    }
</script>

<script>
    document.getElementById("consultaSelect").addEventListener("change", function() {
        calcularIGV();
    });

    document.getElementById("base_disponible").addEventListener("input", function() {
        calcularIGV();
    });

    function calcularIGV() {
        var baseImponible = parseFloat(document.getElementById("base_disponible").value) || 0;
        var igvSelect = document.getElementById("consultaSelect").value;
        var igv = 0;
        var total = 0;

        if (igvSelect === "2") {
            igv = baseImponible * 0.18;
            total = baseImponible + igv;
        }

        document.getElementById("igv").value = igv.toFixed(2);
        document.getElementById("total").value = total.toFixed(2);
    }
</script>

<!-- ecxel -->

<script>
    function redirectToURL(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        if (selectedOption.value !== "") {
            window.location.href = selectedOption.value;
        }
    }
</script>
@endsection

