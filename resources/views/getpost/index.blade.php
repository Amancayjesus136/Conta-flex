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
            <form id="consultaForm" action="{{ route('getpost.consultarRuc2') }}" method="get">
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
            
            <form id="guardarForm" action="{{ route('getpost.guardar2') }}" method="post" class="was-validated">
                @csrf
                <input type="hidden" name="ruc" id="ruc_guardar">
                <input type="hidden" name="nombre" id="nombre_guardar">
                </div>
                <button style="margin-top: 10px;" type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
            </form>
        </div>
    </div>
</div>

<script>
    function consultarRuc() {
        document.getElementById('consultaForm').action = "{{ route('getpost.consultarRuc2') }}";
        document.getElementById('consultaForm').submit();
    }

    function guardar() {
        document.getElementById('ruc_guardar').value = document.getElementsByName('ruc_api')[0].value;
        document.getElementById('nombre_guardar').value = document.getElementsByName('nombre_api')[0].value;

        document.getElementById('guardarForm').action = "{{ route('getpost.guardar2') }}";
        document.getElementById('guardarForm').submit();
    }
</script>

<script>
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

        return false; 
    }
</script>

@endsection

