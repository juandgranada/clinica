@extends('dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Pacientes</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para crear nuevo paciente -->
    <div class="mb-3">
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">
            ➕ Nuevo Paciente
        </a>
    </div>

    <!-- Tabla de pacientes -->
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Seguro Médico</th>
                        <th>Contacto Emergencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->id }}</td>
                            <td>{{ $paciente->persona->documento }}</td>
                            <td>{{ $paciente->persona->nombres }}</td>
                            <td>{{ $paciente->persona->apellidos }}</td>
                            <td>{{ $paciente->seguro_medico }}</td>
                            <td>{{ $paciente->contacto_emergencia }}</td>
                            <td>
                                <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-info btn-sm">
                                    👀 Ver
                                </a>
                                <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-warning btn-sm">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este paciente?')">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay pacientes registrados.</td>
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