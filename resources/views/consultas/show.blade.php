@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detalle de la Consulta Médica</h2>

    <div class="card shadow">
        <div class="card-body">
            <p><strong>Paciente:</strong> {{ $consulta->paciente->nombres }} {{ $consulta->paciente->apellidos }}</p>
            <p><strong>Médico:</strong> {{ $consulta->medico->nombres }} {{ $consulta->medico->apellidos }}</p>
            <p><strong>Fecha y Hora:</strong> {{ $consulta->fecha_hora }}</p>
            <p><strong>Motivo de la Consulta:</strong><br>{{ $consulta->motivo_consulta }}</p>
            <p><strong>Diagnóstico:</strong> {{ $consulta->diagnostico }}</p>
            <p><strong>Tratamiento Sugerido:</strong> {{ $consulta->tratamiento_sugerido }}</p>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('consultas_medicas.index') }}" class="btn btn-secondary">⬅ Volver</a>
                <a href="{{ route('consultas_medicas.edit', $consulta->id) }}" class="btn btn-warning">✏ Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection
