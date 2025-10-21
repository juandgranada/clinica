@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles de la Consulta Médica</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $consulta->id }}</p>
            <p><strong>Paciente:</strong> {{ $consulta->paciente->persona->nombres }} {{ $consulta->paciente->persona->apellidos }}</p>
            <p><strong>Médico:</strong> {{ $consulta->medico->persona->nombres }} {{ $consulta->medico->persona->apellidos }}</p>
            <p><strong>Fecha y hora:</strong> {{ $consulta->fecha_hora }}</p>
            <p><strong>Motivo de la consulta:</strong> {{ $consulta->motivo_consulta }}</p>
            <p><strong>Diagnóstico:</strong> {{ $consulta->diagnostico }}</p>
            <p><strong>Tratamiento sugerido:</strong> {{ $consulta->tratamiento_sugerido }}</p>
        </div>
    </div>

    <h4>Imágenes asociadas</h4>
    @if ($consulta->imagenes && $consulta->imagenes->count())
        <div class="row">
            @foreach ($consulta->imagenes as $img)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $img->ruta_imagen) }}"
                            class="card-img-top"
                            alt="Imagen de consulta">
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
    
    {{-- Botón para abrir el modal --}}
    <div class="mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarImagen">
            📷Agregar Imagen
        </button>
    </div>

    {{-- Modal para subir imagen --}}
    <div class="modal fade" id="modalAgregarImagen" tabindex="-1" aria-labelledby="modalAgregarImagenLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalAgregarImagenLabel">Subir Imagen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">
            <div class="row mb-3">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control"name="consulta_id" value="{{ $consulta->id }}">
            <input type="file" class="form-control"name="ruta_imagen" required>
            <br>
            <select name="tipo_imagen" class="form-control" required>
                <option value="">-- Selecciona --</option>
                <option value="radiografía">Radiografía</option>
                <option value="examen">Examen</option>
                <option value="documento">Documento</option>
                <option value="otros">Otros</option>
            </select>
            <br>
            <textarea class="form-control" name="descripcion"></textarea>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
        </div>
        </div>
    </div>
    </div>


@endsection    

