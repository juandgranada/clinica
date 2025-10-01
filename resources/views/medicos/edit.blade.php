@extends('layouts.app')

@section('content')
<h2>Editar Médico</h2>

<form action="{{ route('medicos.update', $medico) }}" method="POST">
    @csrf
    @method('PUT')

    <h3>Datos Personales</h3>
    <label>Tipo Documento: <input type="text" name="tipo_documento" value="{{ $medico->persona->tipo_documento }}"></label>
    <label>Documento: <input type="text" name="documento" value="{{ $medico->persona->documento }}"></label>
    <label>Nombres: <input type="text" name="nombres" value="{{ $medico->persona->nombres }}"></label>
    <label>Apellidos: <input type="text" name="apellidos" value="{{ $medico->persona->apellidos }}"></label>
    <label>Fecha Nacimiento: <input type="date" name="fecha_nacimiento" value="{{ $medico->persona->fecha_nacimiento }}"></label>
    <label>Teléfono: <input type="text" name="telefono" value="{{ $medico->persona->telefono }}"></label>
    <label>Email: <input type="email" name="email" value="{{ $medico->persona->email }}"></label>

    <h3>Datos de Médico</h3>
    <label>Tarjeta Profesional: <input type="text" name="tarjeta_profesional" value="{{ $medico->tarjeta_profesional }}"></label>
    <label>Especialidad: <input type="text" name="especialidad" value="{{ $medico->especialidad }}"></label>

    <button type="submit">Actualizar</button>
</form>
@endsection
