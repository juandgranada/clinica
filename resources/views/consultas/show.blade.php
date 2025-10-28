@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h2>Detalles de la Consulta Médica</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            {{-- 
            <p><strong>ID:</strong> {{ $consulta->id }}</p>
            --}}
            <p><strong>Paciente:</strong> {{ $consulta->paciente->persona->nombres }} {{ $consulta->paciente->persona->apellidos }}</p>
            <p><strong>Médico:</strong> {{ $consulta->medico->persona->nombres }} {{ $consulta->medico->persona->apellidos }}</p>
            <p><strong>Fecha y hora:</strong> {{ $consulta->fecha_hora }}</p>
            <p><strong>Motivo de la consulta:</strong> {{ $consulta->motivo_consulta }}</p>
            <p><strong>Diagnóstico:</strong> {{ $consulta->diagnostico }}</p>
            <p><strong>Tratamiento sugerido:</strong> {{ $consulta->tratamiento_sugerido }}</p>
            
        </div>
    </div>

    <a href="{{ route('consultas_medicas.index') }}" class="btn btn-secondary mb-3">⬅️ Volver</a>
    <br>
    {{-- Botón para abrir el modal --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarImagen">
        📷 Agregar Imagen
    </button>

    <h4 class="mt-4">Imágenes asociadas</h4>
    @if ($consulta->imagenes && $consulta->imagenes->count())
        <div class="row">
            @foreach ($consulta->imagenes as $img)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $img->ruta_imagen) }}" class="card-img-top" alt="Imagen de consulta">
                        <div class="card-body text-center">
                            <p>{{ $img->descripcion }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No hay imágenes cargadas para esta consulta.</p>
    @endif
</div>

{{-- Modal para subir imagen --}}
<div class="modal fade" id="modalAgregarImagen" tabindex="-1" role="dialog" aria-labelledby="modalAgregarImagenLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarImagenLabel">Subir Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="consulta_id" value="{{ $consulta->id }}">
                    <div class="form-group">
                        <label for="ruta_imagen">Selecciona una imagen</label>
                        <input type="file" class="form-control" name="ruta_imagen" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_imagen">Tipo de imagen</label>
                        <select name="tipo_imagen" class="form-control" required>
                            <option value="">-- Selecciona --</option>
                            <option value="Radiografia">Radiografía</option>
                            <option value="Ecografia">Ecografía</option>
                            <option value="Mamografia">Mamografía</option>
                            <option value="Resonancia Magnética">Resonancia Magnética</option>
                            <option value="Tomografia">Tomografía</option>
                            <option value="Genérica">Genérica</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop