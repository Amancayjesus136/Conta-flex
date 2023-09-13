@extends('welcome')
@section('nuevo_contenido')
<div class="container-fluid vh-100 d-flex align-items-center" >
    <div class="card shadow mx-auto">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Consulta de Placa</h2>
        </div>
        <div class="card-body">
            <form action="/consultar-placa" method="get"> <!-- Cambiamos la acción a "/consultar-placa" -->
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="placa" id="placa" required placeholder="Ingrese la Placa"> <!-- Cambiamos el name y el id a "placa" -->
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </div>
                </div>
            </form>

            @if(isset($data))
                <h3 class="text-center mb-4">Resultado:</h3>
                @if(isset($data['error']))
                    <div class="alert alert-danger">
                        <strong>Error:</strong> {{ $data['error'] }}
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="bg-white text-black">Nombre</th>
                                <td>{{ $data['nombre'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Marca</th>
                                <td>{{ $data['marca'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Modelo</th>
                                <td>{{ $data['modelo'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Año</th>
                                <td>{{ $data['anio'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Color</th>
                                <td>{{ $data['color'] }}</td>
                            </tr>
                        </table>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
