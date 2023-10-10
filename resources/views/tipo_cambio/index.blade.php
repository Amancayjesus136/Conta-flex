@extends('layouts.admin')

@section('content')
<style>
  /* Estilo para el select más grande */
  #moneda {
    width: 150px;
    height: 36px; 
    font-size: 13px;
  }
</style>

<div class="col-12 col-md-12">
    <form action="{{route('tipo_cambio.store')}}" method="POST">
        @csrf
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <div class="row">
                <div class="col-12">
                    <input type="date" class="form-control mb-2" id="mes" name="fecha_creacion" aria-label="Mes" placeholder="Fecha de Creación" required>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="number" class="form-control mb-2" id="ano1" name="tipo_compra" aria-label="Año" placeholder="Compra..." required>
                </div>
                <div class="col-4">
                    <input type="number" class="form-control mb-2" id="ano2" name="tipo_venta" aria-label="Año" placeholder="Venta..." required>
                </div>
                <div class="col-4">
                    <select class="form-select form-select-sm mb-2" id="moneda" name="moneda" aria-label=".form-select-sm example" required>
                        <option value="" disabled selected>Seleccionar...</option>
                        <option value="soles">Soles</option>
                        <option value="dolares">Dólares</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Registrar <i class="fas fa-paper-plane"></i></button>
        </div>
    </form>
</div><br>

<div class="table-responsive table-card">
    <table class="table table-nowrap table-striped-columns mb-0">
        <thead class="table-light">
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <label class="form-check-label" for="cardtableCheck"></label>
                    </div>
                </th>
                <th scope="col">#</th>
                <th scope="col">Moneda</th>
                <th scope="col">Tipo Cambio Compra</th>
                <th scope="col">Tipo Cambio Venta</th>
                <th scope="col">Fecha Creación</th>
                <th scope="col">Acciones</th>   
            </tr>
        </thead>
        <tbody>
            <tr>
                @php $contador = 1; @endphp
                @foreach($tipocambios as $tipocambio)
                    <tr>
                    <td>
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cardtableCheck03">
                                <label class="form-check-label" for="cardtableCheck03"></label>
                            </div>
                        </td>
                        <td>{{ $contador }}</td>
                        <td>{{ $tipocambio->moneda }}</td>
                        <td>{{ $tipocambio->tipo_compra }}</td>
                        <td>{{ $tipocambio->tipo_venta }}</td>
                        <td>{{ $tipocambio->fecha_creacion }}</td>
                        <td>
                        <a href="#" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $tipocambio->id }}">
                            <i class="ri-attachment-2"></i> Adjuntar
                        </a>
                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $tipocambio->id }}">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarTragoModal{{ $tipocambio->id}}">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                    @php 
                        $contador++; 
                    @endphp
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection
