@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Médicos</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para crear nuevo médico -->
    <div class="mb-3">
        <a href="{{ route('medicos.create') }}" class="btn btn-primary">
            ➕ Nuevo Médico
        </a>
    </div>

    <!-- Tabla de médicos -->
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tarjeta Profesional</th>
                        <th>Especialidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicos as $medico)
                        <tr>
                            <td>{{ $medico->id }}</td>
                            <td>{{ $medico->persona->documento }}</td>
                            <td>{{ $medico->persona->nombres }}</td>
                            <td>{{ $medico->persona->apellidos }}</td>
                            <td>{{ $medico->tarjeta_profesional }}</td>
                            <td>{{ $medico->especialidad }}</td>
                            <td>
                                <a href="{{ route('medicos.show', $medico) }}" class="btn btn-info btn-sm">
                                    👀 Ver
                                </a>
                                <a href="{{ route('medicos.edit', $medico) }}" class="btn btn-warning btn-sm">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('medicos.destroy', $medico) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este medico?')">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay médicos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('alert-success');
        if (alert) {
            setTimeout(() => {
                // Desaparece con animación si tienes Bootstrap
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500); // luego lo elimina del DOM
            }, 3000); // 3000 ms = 3 segundos
        }
    });
</script>