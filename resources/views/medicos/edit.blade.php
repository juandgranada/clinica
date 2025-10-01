@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Médico</h2>

    <form action="{{ route('medicos.update', $medico->id) }}" method="POST" class="card shadow p-4">
        @csrf
        @method('PUT')

        <!-- Documento, Nombres, Apellidos -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Documento</label>
                <input type="text" name="documento" value="{{ $medico->persona->documento }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Nombres</label>
                <input type="text" name="nombres" value="{{ $medico->persona->nombres }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Apellidos</label>
                <input type="text" name="apellidos" value="{{ $medico->persona->apellidos }}" class="form-control" required>
            </div>
        </div>

        <!-- Tarjeta profesional y especialidad -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Tarjeta Profesional</label>
                <input type="text" name="tarjetaProfesional" value="{{ $medico->tarjetaProfesional }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Especialidad</label>
                <input type="text" name="especialidad" value="{{ $medico->especialidad }}" class="form-control" required>
            </div>
        </div>

        <!-- Botones -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('medicos.index') }}" class="btn btn-secondary">⬅ Volver</a>
            <button type="submit" class="btn btn-primary">💾 Guardar Cambios</button>
        </div>
    </form>
</div>
@endsection
