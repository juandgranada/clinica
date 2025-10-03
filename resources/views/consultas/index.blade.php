@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Consultas Médicas</h2>
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
                    @foreach($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->id }}</td>
                            <td>{{ $consulta->paciente->nombres }} {{ $consulta->paciente->apellidos }}</td>
                            <td>{{ $consulta->medico->nombres }} {{ $consulta->medico->apellidos }}</td>
                            <td>{{ $consulta->fecha_hora }}</td>
                            <td>
                                <a href="{{ route('consultas_medicas.show', $consulta->id) }}" class="btn btn-info btn-sm">👁 Ver</a>
                                <a href="{{ route('consultas_medicas.edit', $consulta->id) }}" class="btn btn-warning btn-sm">✏ Editar</a>
                                <form action="{{ route('consultas_medicas.destroy', $consulta->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta consulta?')">🗑 Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
