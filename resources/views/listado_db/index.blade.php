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
                                        <!-- Botón para ver detalle del usuario en modal -->
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detalleUsuarioModal{{ $usuario->id }}">
                                            <i class="bi bi-eye"></i> Detalles
                                        </button>
                                    </td>
                                @else
                                    <td>No se encontró información de placa para este usuario.</td>
                                @endif
                            </tr>

                            <!-- Modal para mostrar detalles del usuario -->
                            <div class="modal fade" id="detalleUsuarioModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="detalleUsuarioModalLabel{{ $usuario->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detalleUsuarioModalLabel{{ $usuario->id }}">Detalles del Usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Aquí se mostrarán los detalles del usuario -->
                                            <p><strong>ID:</strong> {{ $usuario->id }}</p>
                                            <p><strong>Propietario:</strong> {{ $usuario->propietario }}</p>
                                            <p><strong>Descripción:</strong> {{ $usuario->descripcion }}</p>
                                            <p><strong>Tipo Documento:</strong> {{ $usuario->tipo_documento }}</p>
                                            <p><strong>Documento:</strong> {{ $usuario->documento }}</p>
                                            <p><strong>Dirección:</strong> {{ $usuario->direccion }}</p>
                                            <!-- Agrega aquí las demás propiedades del usuario que deseas mostrar -->
                                            @if ($placa)
                                                <p><strong>Placa:</strong> {{ $placa->placa }}</p>
                                                <p><strong>Tarjeta:</strong> {{ $placa->tarjeta }}</p>
                                                <p><strong>Serie:</strong> {{ $placa->serie }}</p>
                                                <p><strong>Marca:</strong> {{ $placa->marca }}</p>
                                                <p><strong>Titulo_Anio:</strong> {{ $placa->titulo_Anio }}</p>
                                                <p><strong>Tipo_nro:</strong> {{ $placa->titulo_nro }}</p>
                                                <p><strong>Tipo_propietario:</strong> {{ $placa->tipo_propietario }}</p>
                                                <p><strong>Modelo:</strong> {{ $placa->modelo }}</p>
                                                <p><strong>Combustible:</strong> {{ $placa->combustible }}</p>
                                                <p><strong>Carroceria:</strong> {{ $placa->carroceria }}</p>
                                                <p><strong>Motor:</strong> {{ $placa->motor }}</p>
                                                <p><strong>Anio:</strong> {{ $placa->anio }}</p>
                                                <p><strong>Clase:</strong> {{ $placa->clase }}</p>
                                                <p><strong>Color:</strong> {{ $placa->color }}</p>
                                                <p><strong>Cilindros:</strong> {{ $placa->cilindros }}</p>
                                                <p><strong>Asientos:</strong> {{ $placa->asientos }}</p>
                                                <p><strong>Longitud:</strong> {{ $placa->longitud }}</p>
                                                <p><strong>Ancho:</strong> {{ $placa->ancho }}</p>
                                                <p><strong>Altura:</strong> {{ $placa->altura }}</p>
                                                <p><strong>Peso_bruto:</strong> {{ $placa->peso_bruto }}</p>
                                                <p><strong>Estado:</strong> {{ $placa->estado }}</p>
                                                <p><strong>Fecha de consulta:</strong> {{ $placa->created_at }}</p>
                                            @else
                                                <p>No se encontró información de placa para este usuario.</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
