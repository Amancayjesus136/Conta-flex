@extends('layouts.admin')

@section('content')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Editar Registro de Entrada y Salida de Vehículo</h4>
            </div>
        </div>
    </div>

    <form action="{{ route('actualizar_vehiculo', ['id' => $vehiculo->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="Fecha" class="form-label">Fecha:</label>
            </div>
            <div class="col-lg-9">
                <input type="date" name="Fecha" class="form-control" value="{{ $vehiculo->Fecha }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="Placa" class="form-label">Placa:</label>
            </div>
            <div class="col-lg-9">
                <input type="text" id="Placa" name="Placa" class="form-control" value="{{ $vehiculo->Placa }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="Direccion" class="form-label">Dirección:</label>
            </div>
            <div class="col-lg-9">
                <input type="text" id="Direccion" name="Direccion" class="form-control" value="{{ $vehiculo->Direccion }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="Hora_Entrada" class="form-label">Hora de Entrada:</label>
            </div>
            <div class="col-lg-9">
                <input type="time" id="Hora_Entrada" name="Hora_Entrada" class="form-control" value="{{ $vehiculo->Hora_Entrada }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="Hora_Salida" class="form-label">Hora de Salida:</label>
            </div>
            <div class="col-lg-9">
                <input type="time" id="Hora_Salida" name="Hora_Salida" class="form-control" value="{{ $vehiculo->Hora_Salida }}" @if($vehiculo->Hora_Salida) disabled @endif>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="Total_Horas" class="form-label">Total de horas:</label>
            </div>
            <div class="col-lg-9">
                <input type="text" id="Total_Horas" name="Total_Horas" class="form-control" value="{{ $vehiculo->Total_Horas }}" required readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="Confianza_Placa" class="form-label">AB:</label>
            </div>
            <div class="col-lg-9">
                <input type="text" name="AB" class="form-control" value="{{ $vehiculo->AB }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="Tipo" class="form-label">Tipo:</label>
            </div>
            <div class="col-lg-9">
                <input type="text" name="Tipo" class="form-control" value="{{ $vehiculo->Tipo }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="Tipo_Porcentaje" class="form-label">Tipo %:</label>
            </div>
            <div class="col-lg-9">
                <input type="text" name="Tipo_Porcentaje" class="form-control" value="{{ $vehiculo->Tipo_Porcentaje }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="IZQ" class="form-label">IZQ:</label>
            </div>
            <div class="col-lg-9">
                <input type="text" id="IZQ" name="IZQ" class="form-control" value="{{ $vehiculo->IZQ }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="DER" class="form-label">DER:</label>
            </div>
            <div class="col-lg-9">
                <input type="text" id="DER" name="DER" class="form-control" value="{{ $vehiculo->DER }}" required>
            </div>
        </div>

        <div class="row mb-3">
    <div class="col-lg-3">
        <label for="Probabilidad" class="form-label">Monto:</label>
    </div>
    <div class="col-lg-9">
        <div class="input-group">
            <span class="input-group-text">S/. </span>
            <input type="text" id="MontoCalculado" name="Probabilidad" class="form-control" value="{{ $vehiculo->Probabilidad }}" require>
        </div>
    </div>
</div>


        <!-- Botones Actualizar y Cancelar -->
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('vehiculos-placas') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<script>
    // Calcula y actualiza el campo de "Total de horas" y el monto calculado
function calcularTotalHoras() {
    const horaEntrada = document.getElementById('Hora_Entrada').value;
    const horaSalida = document.getElementById('Hora_Salida').value;

    if (horaEntrada && horaSalida) {
        const entrada = new Date(`2000-01-01 ${horaEntrada}`);
        const salida = new Date(`2000-01-01 ${horaSalida}`);

        let milisegundos = salida - entrada;

        // Manejo del caso cuando la salida es anterior a la entrada (paso de día)
        if (milisegundos < 0) {
            milisegundos += 24 * 60 * 60 * 1000;
        }

        const horas = Math.floor(milisegundos / 1000 / 60 / 60);
        const minutos = Math.floor((milisegundos / 1000 / 60) % 60);

        document.getElementById('Total_Horas').value = `${horas} horas ${minutos} minutos`;

        // Calcular el monto basado en el tiempo y actualizar el campo MontoCalculado
        const totalHoras = horas + minutos / 60;
        let montoCalculado = 0;

        if (totalHoras <= 0.5) {
            montoCalculado = 6; // 6 soles por media hora
        } else if (totalHoras <= 1) {
            montoCalculado = 10; // 10 soles por una hora completa
        } else {
            // Realiza cualquier otro cálculo necesario para tarifas adicionales
            // Puedes ajustar esta lógica según tus necesidades
        }

        document.getElementById('MontoCalculado').value = montoCalculado.toFixed(2);
    }
}

// Evento para calcular automáticamente el valor del campo Dirección
function actualizarDireccion() {
    const horaSalida = document.getElementById('Hora_Salida').value;
    const direccionInput = document.getElementById('Direccion');

    if (horaSalida) {
        direccionInput.value = 'SALIDA';
    } else {
        direccionInput.value = 'INGRESO';
    }
}

// Evento para calcular y actualizar automáticamente el campo Total de horas
function calcularTotalHoras() {
    const horaEntrada = document.getElementById('Hora_Entrada').value;
    const horaSalida = document.getElementById('Hora_Salida').value;

    if (horaEntrada && horaSalida) {
        // ... (código de cálculo de horas)
    }
}

// Evento para habilitar el campo de salida y actualizar dirección
document.getElementById('Hora_Entrada').addEventListener('change', function() {
    document.getElementById('Hora_Salida').removeAttribute('disabled');
    actualizarDireccion();
});

// Evento para calcular y actualizar automáticamente al cambiar la hora de salida
document.getElementById('Hora_Salida').addEventListener('change', function() {
    calcularTotalHoras();
    actualizarDireccion();
});

// Evento para capturar y dividir la placa en IZQ y DER
document.getElementById('Placa').addEventListener('input', function() {
    const placa = this.value;
    const izq = placa.substring(0, 3);
    const der = placa.substring(placa.length - 3);

    document.getElementById('IZQ').value = izq;
    document.getElementById('DER').value = der;
});

// Calcula y actualiza el campo de "Total de horas"
function calcularTotalHoras() {
    const horaEntrada = document.getElementById('Hora_Entrada').value;
    const horaSalida = document.getElementById('Hora_Salida').value;

    if (horaEntrada && horaSalida) {
        const entrada = new Date(`2000-01-01 ${horaEntrada}`);
        const salida = new Date(`2000-01-01 ${horaSalida}`);

        let milisegundos = salida - entrada;

        // Manejo del caso cuando la salida es anterior a la entrada (paso de día)
        if (milisegundos < 0) {
            milisegundos += 24 * 60 * 60 * 1000;
        }

        const horas = Math.floor(milisegundos / 1000 / 60 / 60);
        const minutos = Math.floor((milisegundos / 1000 / 60) % 60);

        document.getElementById('Total_Horas').value = `${horas} horas ${minutos} minutos`;
    }
}

// Evento para calcular automáticamente al cambiar la hora de salida
document.getElementById('Hora_Salida').addEventListener('change', calcularTotalHoras);

// Habilitar el campo de salida al seleccionar la hora de entrada
document.getElementById('Hora_Entrada').addEventListener('change', function() {
    document.getElementById('Hora_Salida').removeAttribute('disabled');
});
</script>

@endsection
