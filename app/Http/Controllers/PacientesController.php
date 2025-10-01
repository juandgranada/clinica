<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use App\Models\Personas;
use Illuminate\Http\Request;

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
        $persona = Personas::create($request->only([
            'tipo_documento',
            'documento',
            'nombres',
            'apellidos',
            'fecha_nacimiento',
            'telefono',
            'email'
        ]));

        Pacientes::create([
            'persona_id' => $persona->id,
            'seguro_medico' => $request->seguro_medico,
            'contacto_emergencia' => $request->contacto_emergencia,
        ]);

        return redirect()->route('pacientes.index');
    }
    public function show($id)
    {
        $paciente = Pacientes::with('persona')->findOrFail($id);
        return view('pacientes.show', compact('paciente'));
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
