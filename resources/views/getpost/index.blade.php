@extends('layouts.admin')

@section('content')
    <div class="card shadow mx-auto">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Consulta de RUC</h2>
        </div>
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
                            <button type="button" class="btn btn-primary" onclick="consultarRuc()">Consultar</button><br><br><br>
                        </div>
                    </div>
                </div>

                @if(isset($data))
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
                <button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
            </form>
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
@endsection
