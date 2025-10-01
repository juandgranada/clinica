@extends('layouts.app')

@section('content')
<h2>Editar Paciente</h2>

<form action="{{ route('pacientes.update', $paciente) }}" method="POST">
    @csrf
    @method('PUT')

    <h3>Datos Personales</h3>
    <label>Tipo Documento: <input type="text" name="tipo_documento" value="{{ $paciente->persona->tipo_documento }}"></label>
    <label>Documento: <input type="text" name="documento" value="{{ $paciente->persona->documento }}"></label>
    <label>Nombres: <input type="text" name="nombres" value="{{ $paciente->persona->nombres }}"></label>
    <label>Apellidos: <input type="text" name="apellidos" value="{{ $paciente->persona->apellidos }}"></label>
    <label>Fecha Nacimiento: <input type="date" name="fecha_nacimiento" value="{{ $paciente->persona->fecha_nacimiento }}"></label>
    <label>Teléfono: <input type="text" name="telefono" value="{{ $paciente->persona->telefono }}"></label>
    <label>Email: <input type="email" name="email" value="{{ $paciente->persona->email }}"></label>

    <h3>Datos de Paciente</h3>
    <label>Seguro Médico: <input type="text" name="seguro_medico" value="{{ $paciente->seguro_medico }}"></label>
    <label>Contacto de Emergencia: <input type="text" name="contacto_emergencia" value="{{ $paciente->contacto_emergencia }}"></label>

    <button type="submit">Actualizar</button>
</form>
@endsection
