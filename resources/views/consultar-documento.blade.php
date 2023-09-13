@extends('welcome')
@section('nuevo_contenido')
<div class="container-fluid vh-70 d-flex align-items-center">
    <div class="card shadow mx-auto"  style="margin-top: 200px;">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Consulta de Documento</h2>
        </div>
        <div class="card-body">
            <form action="/consultar-documento" method="get">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="dni" id="dni" required placeholder="Ingrese el Documento">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </div>
                </div>
            </form>

            @if(isset($data))
                @if(isset($data['error']))
                    <div class="alert alert-danger">
                        <strong>Error:</strong> {{ $data['error'] }}
                    </div>
                @else
                    <h3 class="text-center mb-4">Resultado:</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="bg-white text-black">Nombres</th>
                                <td>{{ $data['nombres'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Apellido Paterno</th>
                                <td>{{ $data['apellidoPaterno'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Apellido Materno</th>
                                <td>{{ $data['apellidoMaterno'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-black">Documento</th>
                                <td>{{ $data['numeroDocumento'] }}</td>
                            </tr>
                        </table>
                    </div>
                @endif
            @endif
            <div class="text-center" style="margin-bottom: 400px;">
                <a href="{{ route('consultar-documento') }}" class="btn btn-primary">Limpiar</a>
                <a href="/" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endsection

