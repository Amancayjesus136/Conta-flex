@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-100 d-flex align-items-center">
    <div class="card shadow mx-auto">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Consulta de RUC</h2>
        </div>
        <div class="card-body">
        <form id="consultaForm" action="{{ route('getpost.consultarRuc') }}" method="get">
    @csrf
    <div class="form-group">
        <label for="ruc">Número de RUC</label>
        <input type="text" class="form-control" name="ruc" id="ruc" placeholder="Ingrese el RUC">
        <button type="button" class="btn btn-primary" onclick="consultarRuc()">Consultar</button><br><br><br>
    </div>

    @if(isset($data))
        <!-- ... Tu código para mostrar los resultados de la consulta API ... -->
        <div class="row">
            <div class="col-md-6">
                <label for="nombre">Número de RUC</label>
                <p name="ruc">{{ $data['numeroDocumento'] }}</p>
                <input type="hidden" name="ruc_api" value="{{ $data['numeroDocumento'] }}">
            </div>
            <div class="col-md-6">
                <label for="nombre">Nombre</label>
                <p name="nombre">{{ $data['nombre'] }}</p>
                <input type="hidden" name="nombre_api" value="{{ $data['nombre'] }}">
            </div>
        </div>
        
        <button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
    @endif
</form>
<form id="guardarForm" action="{{ route('getpost.guardar') }}" method="post">
    @csrf
    <input type="hidden" name="ruc" id="ruc_guardar">
    <input type="hidden" name="nombre" id="nombre_guardar">
    <div class="row">
            <div class="col-md-6">
                <label for="documento">NumeroDocumento: <span class="required">*</span></label>
                <input type="number" class="form-control" id="ocumento_guardar" name="documento" required>
            </div>
            <div class="col-md-6">
                <label for="edad">Edad: <span class="required">*</span></label>
                <input type="number" class="form-control" id="edad_guardar" name="edad" required>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>

<script>
    function consultarRuc() {
        // Cambiar la acción del formulario para apuntar a la función de consulta
        document.getElementById('consultaForm').action = "{{ route('getpost.consultarRuc') }}";
        document.getElementById('consultaForm').submit();
    }

    function guardar() {
        // Pasar los datos de la consulta API al formulario de guardar
        document.getElementById('ruc_guardar').value = document.getElementsByName('ruc_api')[0].value;
        document.getElementById('nombre_guardar').value = document.getElementsByName('nombre_api')[0].value;

        // Cambiar la acción del formulario para apuntar a la función de guardar
        document.getElementById('guardarForm').action = "{{ route('getpost.guardar') }}";
        document.getElementById('guardarForm').submit();
    }
</script>
@endsection
