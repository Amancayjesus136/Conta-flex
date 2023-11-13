@extends('layouts.admin')

@section('content')
<!-- cabecera -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Compras</h4>
        </div>
    </div>
</div>
<!-- cabecera -->

<div class="container mt-5">
    <div class="card shadow mx-auto">
        <div class="card-body">
            <form id="consultaForm" action="{{ route('getpost.consultarRuc') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ruc">Número de RUC</label>
                            <input type="text" class="form-control" name="ruc" id="ruc" placeholder="Ingrese el RUC">
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="margin-top: 28px;" class="form-group">
                            <button type="button" class="btn btn-primary" onclick="consultarRuc()">Consultar <i class="las la-search"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#agregarModal" class="btn btn-info"><i class="fas fa-cloud-download-alt"></i> Traer Proovedor</button><br><br><br>
                        </div>
                    </div>
                </div>

                @if(isset($data))
                    <div class="row">
                        <div class="col-md-5">
                            <label for="nombre">Proveedor:</label>
                            <p name="nombre">{{ $data['nombre'] }}</p>
                            <input type="hidden" name="nombre_api" value="{{ $data['nombre'] }}">
                        </div>
                        <div class="col-md-3">
                            <label for="nombre">Número de RUC:</label>
                            <p name="ruc">{{ $data['numeroDocumento'] }}</p>
                            <input type="hidden" name="ruc_api" value="{{ $data['numeroDocumento'] }}">
                        </div>
                    </div>
                @endif
            </form>
            
            <form id="guardarForm" action="{{ route('getpost.guardar') }}" method="post" class="was-validated">
                @csrf
                <input type="hidden" name="ruc" id="ruc_guardar">
                <input type="hidden" name="nombre" id="nombre_guardar">

                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="cod_compra">Cod: <span class="required">*</span></label>
                            <input type="any" class="form-control" aria-label="file example" name="cod_compra" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="col-md-12">
                            <label for="documento">N° de Documento: <span class="required">*</span></label>
                            <input type="any" class="form-control" id="ocumento_guardar" name="documento" required>
                            <div class="invalid-feedback">Registro de documento de formulario no válido</div><br>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="col-md-12">
                            <label for="factura_numero">Factura Numero: <span class="required">*</span></label>
                            <input type="any" class="form-control" id="factura_numero" name="factura_numero" required>
                            <div class="invalid-feedback">Registro de documento de formulario no válido</div><br>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-12">
                            <label for="tipo_cambio">Tipo Cambio: <span class="required">*</span></label>
                            <input type="any" class="form-control" id="tipo_cambio" name="tipo_cambio" required>
                            <div class="invalid-feedback">Registro de tipo de cambio de formulario no válido</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="col-md-12">
                            <label for="fecha_comprobante">Fecha Comprobante: <span class="required">*</span></label>
                            <input type="date" class="form-control" id="fecha_comprobante" name="fecha_comprobante" required>
                            <div class="invalid-feedback">Registro de fecha comprobante de formulario no válido</div><br>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="col-md-12">
                            <label for="fecha_emision">Fecha Emisión: <span class="required">*</span></label>
                            <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" required>
                            <div class="invalid-feedback">Registro de fecha emisión de formulario no válido</div><br>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="col-md-12">
                            <label for="fecha_compra">Fecha compra: <span class="required">*</span></label>
                            <input type="date" class="form-control" id="fecha_compra" name="fecha_compra" required>
                            <div class="invalid-feedback">Registro de fecha comprobante de formulario no válido</div><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="col-md-12">
                            <label for="consulta">Consulta: <span class="required">*</span></label>
                            <input type="any" class="form-control" id="consulta" name="consulta" required>
                            <div class="invalid-feedback">Registro de consulta de formulario no válido</div><br>
                        </div>    
                    </div>
                    <div class="col-3">
                        <div class="col-md-12">
                            <label for="base_disponible">Base: <span class="required">*</span></label>
                            <input type="any" class="form-control" id="base_disponible" name="base_disponible" required>
                            <div class="invalid-feedback">Registro de base de formulario no válido</div><br>
                        </div>   
                    </div>
                    <div class="col-3">
                        <div class="col-md-12">
                            <label for="IGV">IGV: <span class="required">*</span></label>
                            <input type="any" class="form-control" id="IGV" name="IGV" required>
                            <div class="invalid-feedback">Registro de igv de formulario no válido</div><br>
                        </div>  
                    </div>
                    <div class="col-3">
                        <div class="col-md-12">
                            <label for="total">Total: <span class="required">*</span></label>
                            <input type="any" class="form-control" id="total" name="total" required>
                            <div class="invalid-feedback">Registro de total de formulario no válido</div><br>
                        </div> 
                    </div>
                </div>
                <button style="margin-top: 10px;" type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
            </form>
        </div>
    </div>
</div>

<script>
    function consultarRuc() {
        document.getElementById('consultaForm').action = "{{ route('getpost.consultarRuc') }}";
        document.getElementById('consultaForm').submit();
    }

    function guardar() {
        document.getElementById('ruc_guardar').value = document.getElementsByName('ruc_api')[0].value;
        document.getElementById('nombre_guardar').value = document.getElementsByName('nombre_api')[0].value;

        document.getElementById('guardarForm').action = "{{ route('getpost.guardar') }}";
        document.getElementById('guardarForm').submit();
    }
</script>

<script>
    // Función para validar el formulario
    function validarFormulario() {
        var codCompra = document.getElementsByName('cod_compra')[0].value;
        var tipoCambio = document.getElementById('tipo_cambio').value;

        if (codCompra === "") {
            document.getElementById('codCompraError').style.display = 'block';
        } else {
            document.getElementById('codCompraError').style.display = 'none';
        }

        if (tipoCambio === "") {
            document.getElementById('tipoCambioError').style.display = 'block';
        } else {
            document.getElementById('tipoCambioError').style.display = 'none';
        }

        // Agrega validaciones para otros campos

        // Resto de la lógica de validación según tus necesidades

        return false; // Cambia esto a true si el formulario es válido
    }
</script>
@endsection


