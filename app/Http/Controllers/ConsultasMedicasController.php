<?php

namespace App\Http\Controllers;

use App\Models\ConsultasMedicas;
use App\Models\Pacientes;
use App\Models\Medicos;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsultasMedicasController extends Controller
{
    /**
     * Mostrar listado de consultas médicas
     */
    public function index()
    {
        $consultas = ConsultasMedicas::with(['paciente', 'medico'])->paginate(10);
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        // Traemos pacientes y médicos con sus datos personales
        $pacientes = Pacientes::with('persona')->get();
        $medicos   = Medicos::with('persona')->get();

        return view('consultas.create', compact('pacientes', 'medicos'));
    }

    /**
     * Guardar nueva consulta
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'motivo_consulta' => 'required|string|max:1000',
            'diagnostico' => 'nullable|string|max:1000',
            'tratamiento_sugerido' => 'nullable|string|max:1000',
        ]);

        ConsultasMedicas::create([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'fecha_hora' => Carbon::now('America/Bogota'), //aquí forzamos fecha y hora actual
            'motivo_consulta' => $request->motivo_consulta,
            'diagnostico' => $request->diagnostico,
            'tratamiento_sugerido' => $request->tratamiento_sugerido,
        ]);

        return redirect()->route('consultas_medicas.index')
            ->with('success', 'Consulta médica registrada correctamente.');
    }

    /**
     * Mostrar detalle de una consulta
     */
    public function show($id)
    {
        $consulta = ConsultasMedicas::with(['paciente.persona', 'medico.persona'])->findOrFail($id);
        $consulta = \App\Models\ConsultasMedicas::with('imagenes')->findOrFail($id);

        return view('consultas.show', compact('consulta'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit($id)
    {
        $consulta = ConsultasMedicas::findOrFail($id);
        $pacientes = Pacientes::with('persona')->get();
        $medicos   = Medicos::with('persona')->get();

        return view('consultas.edit', compact('consulta', 'pacientes', 'medicos'));
    }

    /**
     * Actualizar consulta médica
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'fecha_hora' => 'required|date',
            'motivo_consulta' => 'required|string|max:1000',
            'diagnostico' => 'nullable|string|max:1000',
            'tratamiento_sugerido' => 'nullable|string|max:1000',
        ]);

        $consulta = ConsultasMedicas::findOrFail($id);
        $consulta->update($request->all());

        return redirect()->route('consultas_medicas.index')
            ->with('success', 'Consulta médica actualizada correctamente.');
    }

    /**
     * Eliminar consulta médica
     */
    public function destroy($id)
    {
        $consulta = ConsultasMedicas::findOrFail($id);
        $consulta->delete();

        return redirect()->route('consultas_medicas.index')
            ->with('success', 'Consulta médica eliminada correctamente.');
    }
}
