@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <form id="consultaForm" action="/consultar-tipo-cambio" method="get">
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
                                <button type="submit" class="btn btn-primary">Consultar <i class="las la-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>

                @if(isset($data))
                    @if(isset($data['error']))
                        <div class="alert alert-danger mt-3">
                            <strong>Error:</strong> {{ $data['error'] }}
                        </div>
                    @else
                        <h5 class="text-center mt-4">Resultado:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th class="bg-white text-black">Compra</th>
                                    <td contenteditable="true" id="compra">{{ $data['compra'] }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-white text-black">Venta</th>
                                    <td contenteditable="true" id="venta">{{ $data['venta'] }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-white text-black">Origen</th>
                                    <td contenteditable="true" id="origen">{{ $data['origen'] }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-white text-black">Fecha</th>
                                    <td contenteditable="true" id="fecha">{{ $data['fecha'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-info mt-3" id="copiarBtn" style="color: white;">
                                    <a href="{{ route('tipo_cambio.index') }}" style="color: white; text-decoration: none;">Tipo de Compra <i class="bx bx-dollar"></i></a>
                                </button>
                            </div>
                        </div>
                    @endif
                @endif
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
@endsection
