@extends('layouts.admin')

@section('content')
    <h1>Actividad del usuario {{ $user->name }}</h1>

    @foreach ($activityLogs as $log)
        <p>
            <strong>Fecha:</strong> {{ $log->created_at }}<br>
            <strong>Acción:</strong> {{ $log->description }}<br>
            <strong>Modelo:</strong> {{ $log->subject_type }}<br>
            <strong>ID del Modelo:</strong> {{ $log->subject_id }}<br>
        </p>
    @endforeach
@endsection
