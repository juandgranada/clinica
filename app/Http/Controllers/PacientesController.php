<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use App\Models\Personas;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class PacientesController extends Controller
{
    public function index()
    {
        $pacientes = Pacientes::with('persona')->get();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        // Crear persona
        $persona = Personas::create([
            'tipo_documento'   => $request->tipo_documento,
            'documento'        => $request->documento,
            'nombres'          => $request->nombres,
            'apellidos'        => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono'         => $request->telefono,
            'email'            => $request->email,
        ]);

        // Crear paciente
        $paciente = Pacientes::create([
            'persona_id'          => $persona->id,
            'seguro_medico' => $request->seguro_medico,
            'contacto_emergencia'        => $request->contacto_emergencia,
        ]);

        // Crear usuario automáticamente
        Usuarios::create([
            'persona_id' => $persona->id,
            'username'   => $persona->email,             // email como username
            'password'   => Hash::make($persona->documento), // documento como password
            'rol'        => 'PACIENTE',
        ]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente creado correctamente');

    }


    public function edit(Pacientes $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Pacientes $paciente)
    {
        $paciente->persona->update($request->only([
            'tipo_documento',
            'documento',
            'nombres',
            'apellidos',
            'fecha_nacimiento',
            'telefono',
            'email'
        ]));

        $paciente->update($request->only([
            'seguro_medico',
            'contacto_emergencia'
        ]));

        return redirect()->route('pacientes.index');
    }

    public function destroy(Pacientes $paciente)
    {
        $paciente->delete();
        $paciente->persona->delete();
        return redirect()->route('pacientes.index');
    }
}
