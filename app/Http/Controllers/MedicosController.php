<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use App\Models\Personas;
use Illuminate\Http\Request;

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
        $persona = Personas::create($request->only([
            'tipo_documento',
            'documento',
            'nombres',
            'apellidos',
            'fecha_nacimiento',
            'telefono',
            'email'
        ]));

        Medicos::create([
            'persona_id' => $persona->id,
            'tarjeta_profesional' => $request->tarjeta_profesional,
            'especialidad' => $request->especialidad,
        ]);

        return redirect()->route('medicos.index');
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
