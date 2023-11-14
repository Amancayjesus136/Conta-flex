@extends('layouts.admin')

@section('content')
    <h1>Actividad del usuario {{ $user->name }}</h1>
    <p>No se encontraron registros de actividad para este usuario.</p>
@endsection
