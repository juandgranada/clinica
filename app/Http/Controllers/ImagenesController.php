<?php

namespace App\Http\Controllers;

use App\Models\Imagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
    /**
     * Guarda la imagen asociada a una consulta médica.
     */
    public function store(Request $request)
    {
        $request->validate([
            'consulta_id' => 'required|exists:consultas_medicas,id',
            'ruta_imagen' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'tipo_imagen' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
        ]);

        // Guarda imagen en storage/app/public/imagenes
        $ruta = $request->file('ruta_imagen')->store('imagenes', 'public');

        \App\Models\Imagenes::create([
            'consulta_id' => $request->consulta_id,
            'ruta_imagen' => $ruta,
            'tipo_imagen' => $request->tipo_imagen,
            'descripcion' => $request->descripcion,
            'fecha_carga' => now(),
        ]);

        return redirect()->back()->with('success', 'Imagen guardada correctamente');
    }

    /**
     * Elimina una imagen específica.
     */
    public function destroy($id)
    {
        $imagen = Imagenes::findOrFail($id);

        Storage::disk('public')->delete($imagen->ruta_imagen);
        $consulta_id = $imagen->consulta_id;

        $imagen->delete();

        return redirect()->route('consultas_medicas.show', $consulta_id)
                         ->with('success', 'Imagen eliminada correctamente.');
    }
}
