@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-lg text-black">
                <h2 class="text-center mb-0">Listado de consultas</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Propietario</th>
                                <th>Descripción</th>
                                <th>Tipo Documento</th>
                                <th>Documento</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                @php
                                    $placa = $usuario->placa; // Obtener la placa asociada al usuario
                                @endphp
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->propietario }}</td>
                                    <td>{{ $usuario->descripcion }}</td>
                                    <td>{{ $usuario->tipo_documento }}</td>
                                    <td>{{ $usuario->documento }}</td>
                                    <td>{{ $usuario->direccion }}</td>
                                    <!-- Agrega aquí las propiedades de la placa que deseas mostrar -->
                                    @if ($placa)
                                        <td>
                                            <!-- Enlace para mostrar el formulario de reporte -->
                                            <a href="#" class="btn btn-primary btn-sm" onclick="mostrarFormularioReporte({{ $usuario->id }}, '{{ $placa->placa }}', '{{ $placa->tarjeta }}', '{{ $placa->marca }}', '{{ $placa->modelo }}')">
                                                <i class="bi bi-file-earmark-text"></i> Generar Reporte
                                            </a>
                                        </td>
                                    @else
                                        <td>No se encontró información de placa para este usuario.</td>
                                    @endif
                                </tr>

                                <!-- Modal para mostrar detalles del usuario -->
                                <!-- ... (código del modal como en la versión anterior) ... -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de reporte oculto -->
    <div id="formularioReporte" style="display: none;">
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header bg-lg text-black">
                    <h2 class="text-center mb-0">Generar Reporte</h2>
                </div>
                <div class="card-body">
                    <!-- Agrega aquí el formulario para generar el reporte -->
                    <form action="{{ route('reportesconsu.guardar-reporte') }}" method="post">
                        @csrf
                        <input type="hidden" name="usuario_id" id="usuario_id">
                        <div class="form-group">
                            <label for="descripcion">Descripción del Reporte</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="4" required></textarea>
                        </div>
                        <!-- Mostrar información del usuario y sus placas asociadas -->
                        <div class="form-group">
                            <label>ID de Usuario:</label>
                            <span id="usuario_id_info"></span>
                        </div>
                        <div class="form-group">
                            <label>Placa:</label>
                            <span id="placa_info"></span>
                        </div>
                        <div class="form-group">
                            <label>Tarjeta:</label>
                            <span id="tarjeta_info"></span>
                        </div>
                        <div class="form-group">
                            <label>Marca:</label>
                            <span id="marca_info"></span>
                        </div>
                        <div class="form-group">
                            <label>Modelo:</label>
                            <span id="modelo_info"></span>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('reportes.index') }}"><button type="submit" class="btn btn-primary">Guardar Reporte</button></a>
                            <button type="button" class="btn btn-secondary" onclick="ocultarFormularioReporte()">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para mostrar el formulario de reporte con información del usuario y sus placas
        function mostrarFormularioReporte(usuarioId, placa, tarjeta, marca, modelo) {
            document.getElementById('usuario_id').value = usuarioId;
            document.getElementById('usuario_id_info').innerText = usuarioId;
            document.getElementById('placa_info').innerText = placa;
            document.getElementById('tarjeta_info').innerText = tarjeta;
            document.getElementById('marca_info').innerText = marca;
            document.getElementById('modelo_info').innerText = modelo;
            document.getElementById('formularioReporte').style.display = 'block';
        }

        // Función para ocultar el formulario de reporte
        function ocultarFormularioReporte() {
            document.getElementById('formularioReporte').style.display = 'none';
        }
    </script>
@endsection
