@extends('layouts.admin')

@section('content')
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .form-control {
        border-radius: 20px;
    }

    .custom-card {
        background-color: white;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Estilo para el cuadro blanco */
    .white-box {
        background-color: white;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
</style>
<div class="col-12 col-md-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Ventas</h4>
        </div>
    </div>
<div class="white-box">
    <form action="{{ route('ventas.store') }}" method="post">
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
                <!-- Contenido de la pestaña "Datos" -->
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="ruc">RUC</label>
                            <input type="text" class="form-control" name="ruc" id="ruc" required
                                placeholder="Ingrese el Documento">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group"><br>
                            <label for="nombre_proveedor">Nombre Proveedor</label>
                            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="cod_compra">Código de Compra</label>
                            <input type="text" class="form-control" name="cod_compra" id="cod_compra" required
                                placeholder="Ingrese el Código de Compra">
                        </div>
                    </div>
                </div>
                @if(isset($data))
                @if(isset($data['error']))
                <div class="alert alert-danger">
                    <strong>Error:</strong> {{ $data['error'] }}
                </div>
                @else
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="numero_documento">Número de RUC</label>
                            <input type="text" class="form-control" id="numero_documento" name="ruc"
                                value="{{ $data['numeroDocumento'] }}" readonly>
                        </div>
                    </div>
                </div>
                @endif
                @endif
            </div>
            <div class="tab-pane fade" id="facturacion">
                <!-- Contenido de la pestaña "Facturación" -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="moneda">Moneda</label>
                            <select class="form-select rounded-pill mb-3" aria-label="Moneda" id="moneda"
                                name="moneda">
                                <option selected>Seleccionar moneda...</option>
                                <option value="soles">Soles</option>
                                <option value="dolares">Dólares</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="tipo_cambio">Tipo de Cambio</label>
                            <input type="text" class="form-control" id="tipo_cambio" name="tipo_cambio">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="documento">Documento</label>
                            <input type="text" class="form-control" id="tipo_cambio" name="documento">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="factura_numero">Factura número</label>
                            <input type="text" class="form-control" id="factura_numero" name="factura_numero">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="base_disponible">Base Disponible</label>
                            <input type="text" class="form-control" id="base_disponible" name="base_disponible">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="tasa_IGV">Tasa de IGV</label>
                            <input type="text" class="form-control" id="tasa_IGV" name="tasa_IGV">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="IGV">IGV</label>
                            <input type="text" class="form-control" id="IGV" name="IGV">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="total">Total</label>
                            <input type="text" class="form-control" id="total" name="total">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="fechas">
                <!-- Contenido de la pestaña "Fechas" -->
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="fecha_comprobante">Fecha Comprobante</label>
                            <input type="date" class="form-control" id="fecha_comprobante"
                                name="fecha_comprobante">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="fecha_emision">Fecha de Emisión</label>
                            <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="fecha_venta">Fecha de Venta</label>
                            <input type="date" class="form-control" id="fecha_venta" name="fecha_venta">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Botones del formulario -->
        <div class="row">
            <div class="col-lg-12 text-end"><br><br>
                <button type="submit" class="btn btn-success">Guardar Venta</button>
            </div>
        </div>
    </form>
</div>

<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>

<!-- prismjs plugin -->
<script src="assets/libs/prismjs/prism.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
