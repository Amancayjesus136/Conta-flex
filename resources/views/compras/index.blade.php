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
        <div class="page-title-box d-sm-flex align-items-center justify-content-between style">
            <h4 class="mb-sm-0">Compras</h4>
        </div>
    </div>
<div class="white-box">
<form action="{{ route('compras.store') }}" method="POST" id="agregar-form">
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
                        <input type="text" class="form-control" name="ruc" id="ruc" required placeholder="Ingrese el Documento">
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
                        <input type="text" class="form-control" id="tipo_cambio" name="tipo_cambio">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group"><br>
                        <label for="documento">Documento</label>
                        <input type="number" class="form-control" id="documento" name="documento">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group"><br>
                        <label for="factura_numero">Factura número</label>
                        <input type="text" class="form-control" id="factura_numero" name="factura_numero">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group"><br>
                        <label for="base_disponible">Base Imponible</label>
                        <input type="number" class="form-control" id="base_disponible" name="base_disponible">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group"><br>
                        <label for="IGV">IGV</label>
                        <input type="number" class="form-control" id="IGV" name="IGV" value="18">
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
                        <input type="date" class="form-control" id="fecha_comprobante" name="fecha_comprobante">
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
                        <label for="fecha_compra">Fecha de Compra</label>
                        <input type="date" class="form-control" id="fecha_compra" name="fecha_compra">
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
    $(document).ready(function () {
        $('#agregar-form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('compras.store') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Compra agregada con éxito',
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

<script>
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
