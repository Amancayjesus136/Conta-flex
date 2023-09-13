@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-70 d-flex align-items-center" style="margin-top: 100px;">
    <div class="card shadow mx-auto">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Agregar Nueva Sucursal</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('sucursales.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="jefe_nombre">Nombre Jefe Sucursal:</label>
                            <input type="text" name="jefe_nombre" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre">Nombre Sucursal:</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="direccion">Dirección Sucursal:</label>
                            <input type="text" name="direccion" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="telefono">Teléfono Sucursal:</label>
                            <input type="text" name="telefono" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email Sucursal:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="hora_apertura">Hora Apertura:</label>
                            <input type="time" name="hora_apertura" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="hora_cierre">Hora Cierre:</label>
                            <input type="time" name="hora_cierre" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="activo">Activo:</label>
                            <select name="activo" class="form-control" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre_ciudad">Nombre Ciudad:</label>
                            <input type="text" name="nombre_ciudad" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pais_ciudad">País Ciudad:</label>
                            <input type="text" name="pais_ciudad" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Crear Sucursal</button>
            </form>
        </div>
    </div>
</div>
@endsection
