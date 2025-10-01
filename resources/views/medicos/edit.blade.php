@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Médico</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Datos Personales -->
                <h4 class="mb-3">Datos Personales</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tipoDocumento" class="form-label">Tipo Documento</label>
                        <select name="tipoDocumento" class="form-select" required>
                            <option value="CC" {{ $medico->persona->tipoDocumento == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                            <option value="CE" {{ $medico->persona->tipoDocumento == 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
                            <option value="PEP" {{ $medico->persona->tipoDocumento == 'PEP' ? 'selected' : '' }}>Permiso Especial de Permanencia</option>
                            <option value="NUIP" {{ $medico->persona->tipoDocumento == 'NUIP' ? 'selected' : '' }}>Número Único de Identificación Personal</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="text" name="documento" id="documento" value="{{ $medico-> persona -> documento }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" name="nombres" id="nombres" value="{{ $medico-> persona -> nombres }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" value="{{ $medico-> persona -> apellidos }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="{{ $medico-> persona -> fecha_nacimiento }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" value="{{ $medico-> persona -> telefono }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" name="correo" id="correo" value="{{ $medico-> persona -> email }}" class="form-control" required>
                    </div>
                </div>

                <!-- Datos del Médico -->
                <h5 class="mb-3">Datos del Médico</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tarjetaProfesional" class="form-label">Tarjeta Profesional</label>
                        <input type="text" name="tarjetaProfesional" id="tarjetaProfesional" value="{{ $medico->tarjeta_profesional }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <input type="text" name="especialidad" id="especialidad" value="{{ $medico->especialidad }}" class="form-control" required>
                    </div>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
