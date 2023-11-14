@extends('layouts.admin')

@section('content')

<!-- Agrega esto en tu archivo de diseño, preferiblemente en el head -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <form id="consultaForm" action="{{ route('tipo.consultartipo') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Consulta Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="margin-top: 30px;">
                                <button type="button" class="btn btn-primary" onclick="consultarTipoCambio()">Consultar <i class="las la-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>


                <form id="guardarForm" action="{{ route('tipo.guardar') }}" method="post" class="was-validated">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="bg-white text-black">Compra</th>
                                <td contenteditable="true" id="compra">{{ $data['compra'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Venta</th>
                                <td contenteditable="true" id="venta">{{ $data['venta'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Origen</th>
                                <td contenteditable="true" id="origen">{{ $data['origen'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Fecha</th>
                                <td contenteditable="true" id="fecha">{{ $data['fecha'] ?? '' }}</td>
                            </tr>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-info mt-3" id="copiarBtn" style="color: white;" onclick="guardar()">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    function consultarTipoCambio() {
        var fecha = document.getElementById('fecha').value;

        if (fecha) {
            document.getElementById('consultaForm').action = "{{ route('tipo.consultartipo') }}";
            document.getElementById('consultaForm').submit();
        } else {
            alert('Por favor, seleccione una fecha para la consulta.');
        }
    }

    function guardar() {
        var compra = document.getElementById('compra').innerText;
        var venta = document.getElementById('venta').innerText;
        var origen = document.getElementById('origen').innerText;
        var fecha = document.getElementById('fecha').innerText;

        var formData = new FormData();
        formData.append('compra', compra);
        formData.append('venta', venta);
        formData.append('origen', origen);
        formData.append('fecha', fecha);

        fetch("{{ route('tipo.guardar') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            window.location.href = "{{ route('tipo_cambio.index') }}";
        })
        .catch(error => {
            console.error('Error al guardar datos:', error);
            alert('Error al guardar datos');
        });
    }
</script>
@endsection
