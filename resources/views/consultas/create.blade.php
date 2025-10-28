@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Nueva Consulta Médica</h2>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('consultas_medicas.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="paciente_id" class="form-label">Paciente</label>
                        <select class="form-control" name="paciente_id" required>
                            <option value="">-- Selecciona --</option>
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->persona->nombres }} {{ $paciente->persona->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="medico_id" class="form-label">Médico</label>
                        <select class="form-control" name="medico_id" required>
                            <option value="">-- Selecciona --</option>
                            @foreach($medicos as $medico)
                                <option value="{{ $medico->id }}">{{ $medico->persona->nombres }} {{ $medico->persona->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                    <input type="text" class="form-control" value="{{ now() }}" readonly>
                </div>


                <div class="mb-3">
                    <label for="motivo_consulta" class="form-label">Motivo de la Consulta</label>
                    <textarea class="form-control" name="motivo_consulta" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="diagnostico" class="form-label">Diagnóstico</label>
                    <input type="text" class="form-control" name="diagnostico">
                </div>

                <div class="mb-3">
                    <label for="tratamiento_sugerido" class="form-label">Tratamiento Sugerido</label>
                    <input type="text" class="form-control" name="tratamiento_sugerido">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('consultas_medicas.index') }}" class="btn btn-secondary">⬅ Volver</a>
                    <button type="submit" class="btn btn-success">💾 Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
