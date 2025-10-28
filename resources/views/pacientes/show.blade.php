@extends('dashboard')

@section('content')
<div class="container">
    <h1>Detalles del Paciente</h1>

    <div class="card shadow mt-3">
        <div class="card-body">
            <h4 class="card-title"> <strong>{{ $paciente->persona->nombres }} {{ $paciente->persona->apellidos }}</strong></h4>
            <br></br>
            <p><strong>Tipo Documento:</strong> {{ $paciente->persona->tipo_documento }}</p>
            <p><strong>Documento:</strong> {{ $paciente->persona->documento }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $paciente->persona->fecha_nacimiento }}</p>
            <p><strong>Teléfono:</strong> {{ $paciente->persona->telefono }}</p>
            <p><strong>Email:</strong> {{ $paciente->persona->email }}</p>
            <hr>
            <p><strong>Seguro Médico:</strong> {{ $paciente->seguro_medico }}</p>
            <p><strong>Contacto de Emergencia:</strong> {{ $paciente->contacto_emergencia }}</p>
        </div>
    </div>

    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mt-3">⬅️ Volver</a>
</div>
@endsection
