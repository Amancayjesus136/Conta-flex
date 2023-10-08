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
            <h4 class="mb-sm-0">Compras</h4>
        </div>
    </div>
<div class="white-box">
    <form action="{{ route('compras.store') }}" method="POST">
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
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="ruc">RUC</label>
                            <input type="text" class="form-control" name="ruc" id="ruc" required
                                placeholder="Ingrese el Documento">
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group"><br>
                            <label for="nombre_proveedor">Nombre del Proveedor</label>
                            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor">
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="facturacion">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="cod_compra">Cod Compra</label>
                            <select class="form-select rounded-pill mb-3" aria-label="cod_compra" id="cod_compra" name="cod_compra">
                                <option selected>Seleccionar moneda...</option>
                                <option value="soles">Soles</option>
                                <option value="dolares">Dólares</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="tipo_cambio">Tipo de Cambio</label>
                            <input type="number" class="form-control" id="tipo_cambio" name="tipo_cambio">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="documento">Documento</label>
                            <input type="number" class="form-control" id="tipo_cambio" name="documento">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <label for="factura_numero">Factura número</label>
                            <input type="number" class="form-control" id="factura_numero" name="factura_numero">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="base_disponible">Base Disponible</label>
                            <input type="number" class="form-control" id="base_disponible" name="base_disponible">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="tasa_IGV">Tasa de IGV</label>
                            <input type="number" class="form-control" id="tasa_IGV" name="tasa_IGV">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="IGV">IGV</label>
                            <input type="number" class="form-control" id="IGV" name="IGV">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><br>
                            <label for="total">Total</label>
                            <input type="number" class="form-control" id="total" name="total">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="fechas">
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
        <div class="row">
            <div class="col-lg-12 text-end"><br><br>
                <button type="submit" class="btn btn-success">Guardar Venta</button>
            </div>
        </div>
    </form>
</div>

<!-- animaciones -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();

            var form = $(this);

            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario registrado correctamente',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        setTimeout(function() {
                            window.location.href = "{{ route('compras.index') }}";
                        }, 2000);
                    }
                },
                error: function(response) {
                }
            });
        });
    });

</script>

<!-- animaciones -->


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
