@extends('layouts.admin')


@section('content')

<div class="container-fluid vh-70 d-flex align-items-center" style="margin-top: 100px;">
    <div class="card shadow mx-auto">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Consulta de DNI</h2>
        </div>
        <div class="card-body">
            <form action="/consultar-documentodni" method="get">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="dni" id="dni" required placeholder="Ingrese el DNI">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </div>
                </div>

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
                                    <th class="bg-white text-black">DNI</th>
                                    <td>{{ $data['numeroDocumento'] }}</td>
                                </tr>
                            </table>
                        </div>
                    @endif
                @endif

                <div class="text-center">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
