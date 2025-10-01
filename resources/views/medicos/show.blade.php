@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Médico</h1>

    <div class="card shadow mt-3">
        <div class="card-body">
            <h4 class="card-title">{{ $medico->persona->nombres }} {{ $medico->persona->apellidos }}</h4>
            <p><strong>Tipo Documento: </strong> {{ $medico->persona->tipo_documento }}</p>
            <p><strong>Documento: </strong> {{ $medico->persona->documento }}</p>
            <p><strong>Fecha de Nacimiento: </strong> {{ $medico->persona->fecha_nacimiento }}</p>
            <p><strong>Teléfono: </strong> {{ $medico->persona->telefono }}</p>
            <p><strong>Email: </strong> {{ $medico->persona->email }}</p>
            <hr>
            <p><strong>Tarjeta Profesional: </strong> {{ $medico->tarjeta_profesional }}</p>
            <p><strong>Especialidad: </strong> {{ $medico->especialidad }}</p>
        </div>
    </div>

    <a href="{{ route('medicos.index') }}" class="btn btn-secondary mt-3">⬅️ Volver</a>
</div>
@endsection
