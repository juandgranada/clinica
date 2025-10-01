@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Nuevo Paciente</h2>

    <form action="{{ route('pacientes.store') }}" method="POST" class="card p-4 shadow">
        @csrf

        <h4 class="mb-3">Datos Personales</h4>
        <div class="row mb-3">
            <div class="col-md-6">
            <label class="form-label">Tipo Documento</label>
            <select name="tipo_documento" class="form-select" required>
                <option value="">-- Selecciona --</option>
                <option value="TI">TI - Tarjeta de Identidad</option>
                <option value="CC">CC - Cédula de Ciudadanía</option>
                <option value="CE">CE - Cédula de Extranjería</option>
                <option value="PEP">PEP - Permiso Especial de Permanencia</option>
                <option value="NUIP">NUIP - Número Único de Identificación Personal</option>
            </select>
        </div>

            <div class="col-md-6">
                <label class="form-label">Documento</label>
                <input type="text" name="documento" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nombres</label>
                <input type="text" name="nombres" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Apellidos</label>
                <input type="text" name="apellidos" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Fecha Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <h4 class="mb-3">Datos del Paciente</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Seguro Médico</label>
                <input type="text" name="seguro_medico" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Contacto Emergencia</label>
                <input type="text" name="contacto_emergencia" class="form-control">
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">⬅ Volver</a>
            <button type="submit" class="btn btn-primary">💾 Guardar Paciente</button>
        </div>
    </form>
</div>
@endsection
