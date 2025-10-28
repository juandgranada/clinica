@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Nuevo Médico</h2>

    <form action="{{ route('medicos.store') }}" method="POST" class="card p-4 shadow">
        @csrf

        <h4 class="mb-3">Datos Personales</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo_documento" class="form-label">Tipo Documento</label>
                <select name="tipo_documento" class="form-control" required>
                    <option value="">-- Selecciona --</option>
                    <option value="TI">TI - Tarjeta de Identidad</option>
                    <option value="CC">CC - Cédula de Ciudadanía</option>
                    <option value="CE">CE - Cédula de Extranjería</option>
                    <option value="PEP">PEP - Permiso Especial de Permanencia</option>
                    <option value="NUIP">NUIP - Número Único de Identificación Personal</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" class="form-control" id="documento" name="documento">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres">
            </div>
            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <h4 class="mb-3 mt-4">Datos del Médico</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tarjeta_profesional" class="form-label">Tarjeta Profesional</label>
                <input type="text" class="form-control" id="tarjeta_profesional" name="tarjeta_profesional">
            </div>
            <div class="col-md-6">
                <label for="especialidad" class="form-label">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad">
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('medicos.index') }}" class="btn btn-secondary">⬅ Volver</a>
            <button type="submit" class="btn btn-primary">💾 Guardar Médico</button>
        </div>
    </form>
</div>
@endsection
