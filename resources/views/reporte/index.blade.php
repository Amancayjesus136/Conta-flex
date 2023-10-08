<!-- Modal para Crear Nuevo Tema -->
<div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear nuevo registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="crearModal" method="POST" action="{{ route('reporte.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cod_compra" class="form-label">Cod Compra</label>
                                    <input type="text" class="form-control" id="cod_compra" name="cod_compra" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tipo_cambio" class="form-label">Tipo Cambio</label>
                                    <input type="number" class="form-control" id="tipo_cambio" name="tipo_cambio" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fecha_comprobantes" class="form-label">Fecha Comprobante</label>
                                    <input type="date" class="form-control" id="fecha_comprobantes" name="fecha_comprobantes" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ruc" class="form-label">RUC</label>
                                    <input type="text" class="form-control" id="ruc" name="ruc" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nombre_proveedor" class="form-label">Nombre Proveedor</label>
                                    <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="documento" class="form-label">Documento</label>
                                    <input type="text" class="form-control" id="documento" name="documento" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="factura_numero" class="form-label">Factura Numero</label>
                                    <input type="text" class="form-control" id="factura_numero" name="factura_numero" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fecha_emision" class="form-label">Fecha Emision</label>
                                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fecha_venta" class="form-label">Fecha Venta</label>
                                    <input type="date" class="form-control" id="fecha_venta" name="fecha_venta" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="base_disponible" class="form-label">Base disponible</label>
                                        <input type="number" class="form-control" id="base_disponible" name="base_disponible" required>
                                    </div>
                                </div> 
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="igv" class="form-label">IGV</label>
                                        <input type="number" class="form-control" id="igv" name="igv" required>
                                    </div>
                                </div> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="number" class="form-control" id="total" name="total" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tasa_igv" class="form-label">Tasa IGV</label>
                                    <input type="number" class="form-control" id="tasa_igv" name="tasa_igv" required>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
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
                <form id="editarModalForm{{ $reporteventa->id }}" method="POST" action="#">
                    @csrf
                    @method('PUT')
                    <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cod_compra" class="form-label">Cod Compra</label>
                                    <input type="text" class="form-control" id="cod_compra" name="cod_compra" value="{{ $reporteventa->cod_compra }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tipo_cambio" class="form-label">Tipo Cambio</label>
                                    <input type="number" class="form-control" id="tipo_cambio" name="tipo_cambio" value="{{ $reporteventa->tipo_cambio }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fecha_comprobantes" class="form-label">Fecha Comprobante</label>
                                    <input type="date" class="form-control" id="fecha_comprobantes" name="fecha_comprobantes" value="{{ $reporteventa->fecha_comprobantes }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ruc" class="form-label">RUC</label>
                                    <input type="text" class="form-control" id="ruc" name="ruc" value="{{ $reporteventa->ruc }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nombre_proveedor" class="form-label">Nombre Proveedor</label>
                                    <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="{{ $reporteventa->nombre_proveedor }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="documento" class="form-label">Documento</label>
                                    <input type="text" class="form-control" id="documento" name="documento" value="{{ $reporteventa->documento }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="factura_numero" class="form-label">Factura Numero</label>
                                    <input type="text" class="form-control" id="factura_numero" name="factura_numero" value="{{ $reporteventa->factura_numero }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fecha_emision" class="form-label">Fecha Emision</label>
                                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" value="{{ $reporteventa->fecha_emision }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fecha_venta" class="form-label">Fecha Venta</label>
                                    <input type="date" class="form-control" id="fecha_venta" name="fecha_venta" value="{{ $reporteventa->fecha_venta }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="base_disponible" class="form-label">Base disponible</label>
                                        <input type="number" class="form-control" id="base_disponible" name="base_disponible" value="{{ $reporteventa->base_disponible }}" required>
                                    </div>
                                </div> 
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="igv" class="form-label">IGV</label>
                                        <input type="number" class="form-control" id="igv" name="igv" value="{{ $reporteventa->igv }}" required>
                                    </div>
                                </div> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="number" class="form-control" id="total" name="total" value="{{ $reporteventa->total }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tasa_igv" class="form-label">Tasa IGV</label>
                                    <input type="number" class="form-control" id="tasa_igv" name="tasa_igv" value="{{ $reporteventa->tasa_igv }}" required>
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


<div class="modal fade" id="eliminarModal{{ $reporteventa->id }}" tabindex="-1" aria-labelledby="eliminarEmpresaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarTracoModalLabel">Eliminar registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="eliminarModalForm{{ $reporteventa->id }}" method="POST" action="#">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

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
                           
                        }, 2000);
                    }
                },
                error: function(response) {
                }
            });
        });
    });

</script>

@endsection

