@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Paciente</h2>

    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" class="card shadow p-4">
        @csrf
        @method('PUT')

        <!-- Documento, Nombres, Apellidos -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Documento</label>
                <input type="text" name="documento" value="{{ $paciente->persona->documento }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Nombres</label>
                <input type="text" name="nombres" value="{{ $paciente->persona->nombres }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Apellidos</label>
                <input type="text" name="apellidos" value="{{ $paciente->persona->apellidos }}" class="form-control" required>
            </div>
        </div>

        <!-- Seguro médico y contacto de emergencia -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Seguro Médico</label>
                <input type="text" name="seguroMedico" value="{{ $paciente->seguroMedico }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Contacto Emergencia</label>
                <input type="text" name="contactoEmergencia" value="{{ $paciente->contactoEmergencia }}" class="form-control" required>
            </div>
        </div>

        <!-- Botones -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">⬅ Volver</a>
            <button type="submit" class="btn btn-primary">💾 Guardar Cambios</button>
        </div>
    </form>
</div>
@endsection
