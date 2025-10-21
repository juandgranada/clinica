<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use App\Models\Personas;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;


class MedicosController extends Controller
{
    public function index()
    {
        $medicos = Medicos::with('persona')->get();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
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

        // Crear médico
        $medico = Medicos::create([
            'persona_id'          => $persona->id,
            'tarjeta_profesional' => $request->tarjeta_profesional,
            'especialidad'        => $request->especialidad,
        ]);

        // Crear usuario automáticamente
        Usuarios::create([
            'persona_id' => $persona->id,
            'username'   => $persona->email,             // email como username
            'password'   => Hash::make($persona->documento), // documento como password
            'rol'        => 'MEDICO',
        ]);

        return redirect()->route('medicos.index')->with('success', 'Médico creado correctamente.');
    }

    public function show($id)
    {
        $medico = Medicos::with('persona')->findOrFail($id);
        return view('medicos.show', compact('medico'));
    }


    public function edit(Medicos $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, Medicos $medico)
    {
        $medico->persona->update($request->only([
            'tipo_documento',
            'documento',
            'nombres',
            'apellidos',
            'fecha_nacimiento',
            'telefono',
            'email'
        ]));

        $medico->update($request->only([
            'tarjeta_profesional',
            'especialidad'
        ]));

        return redirect()->route('medicos.index');
    }

    public function destroy(Medicos $medico)
    {
        $medico->delete();
        $medico->persona->delete();
        return redirect()->route('medicos.index');
    }
}
