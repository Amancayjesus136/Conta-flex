@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-lg text-black">
            <h2 class="text-center mb-0">Listado de roles</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <form action="{{ route('cambiarRoles', $usuario->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="rol" value="{{ $role->id }}" {{ $usuario->hasRole($role) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $role->name }}</label>
                                    </div>
                                    @endforeach
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Guardar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
