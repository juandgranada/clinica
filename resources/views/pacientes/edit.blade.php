@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Paciente</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Datos Personales -->
                <h4 class="mb-3">Datos Personales</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tipoDocumento" class="form-label">Tipo Documento</label>
                        <select name="tipoDocumento" class="form-select" required>
                            <option value="CC" {{ $paciente->persona->tipoDocumento == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                            <option value="CE" {{ $paciente->persona->tipoDocumento == 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
                            <option value="PEP" {{ $paciente->persona->tipoDocumento == 'PEP' ? 'selected' : '' }}>Permiso Especial de Permanencia</option>
                            <option value="NUIP" {{ $paciente->persona->tipoDocumento == 'NUIP' ? 'selected' : '' }}>Número Único de Identificación Personal</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="text" name="documento" id="documento" value="{{ $paciente-> persona -> documento }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" name="nombres" id="nombres" value="{{ $paciente-> persona -> nombres }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" value="{{ $paciente-> persona -> apellidos }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="{{ $paciente-> persona -> fecha_nacimiento }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" value="{{ $paciente-> persona -> telefono }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" name="correo" id="correo" value="{{ $paciente-> persona -> email }}" class="form-control" required>
                    </div>
                </div>

                <!-- Datos del Médico -->
                <h5 class="mb-3">Datos del Paciente</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="SeguroMedico" class="form-label">Seguro Médico</label>
                        <input type="text" name="seguroMedico" id="seguroMedico" value="{{ $paciente->seguro_medico }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="contactoEmergencia" class="form-label">Contacto de Emergencia</label>
                        <input type="text" name="contactoEmergencia" id="contactoEmergencia" value="{{ $paciente->contacto_emergencia }}" class="form-control" required>
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
