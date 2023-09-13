@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-lg text-black">
                <h2 class="text-center mb-0">Detalles del usuario</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $usuarios->id }}</td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $usuarios->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $usuarios->email }}</td>
                            </tr>
                            <tr>
                                <th>Roles</th>
                                <td>
                                    @foreach ($usuarios->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
