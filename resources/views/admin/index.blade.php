@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 style="color: white;" class="text-center mb-0">ROLES</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
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
                                    <div class="form-check form-check-inline">
                                        @foreach ($roles as $role)
                                            <input class="form-check-input" type="checkbox" name="rol[]" value="{{ $role->id }}" {{ $usuario->hasRole($role) ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $role->name }}</label>
                                        @endforeach
                                    </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
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
