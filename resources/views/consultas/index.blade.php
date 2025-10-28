@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Consultas Médicas</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
            {{ session('success') }}
        </div>
    @endif


    <a href="{{ route('consultas_medicas.create') }}" class="btn btn-primary mb-3">➕ Nueva Consulta</a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Fecha y Hora</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->id }}</td>
                            <td>{{ $consulta->paciente->persona->nombres }} {{ $consulta->paciente->persona->apellidos }}</td>
                            <td>{{ $consulta->medico->persona->nombres }} {{ $consulta->medico->persona->apellidos }}</td>
                            <td>{{ $consulta->fecha_hora }}</td>
                            <td>
                                <a href="{{ route('consultas_medicas.show', $consulta->id) }}" class="btn btn-info btn-sm">👀 Ver</a>
                                <a href="{{ route('consultas_medicas.edit', $consulta->id) }}" class="btn btn-warning btn-sm">✏ Editar</a>
                                <form action="{{ route('consultas_medicas.destroy', $consulta->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta consulta?')">🗑 Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay consultas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Paginación --}}
            <div class="d-flex justify-content-center">
                {{ $consultas->links() }}
            </div>
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

