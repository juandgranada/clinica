<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    // Crear usuario al registrar un médico
    public function crearUsuarioMedico(Personas $persona, Request $request)
    {
        Usuarios::create([
            'persona_id' => $persona->id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'rol' => 'MEDICO',
        ]);
    }

    // Crear usuario al registrar un paciente
    public function crearUsuarioPaciente(Personas $persona, Request $request)
    {
        Usuarios::create([
            'persona_id' => $persona->id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'rol' => 'PACIENTE',
        ]);
    }

    // (Opcional) Crear usuario administrador manualmente
    public function crearUsuarioAdmin(Personas $persona, Request $request)
    {
        Usuarios::create([
            'persona_id' => $persona->id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'rol' => 'ADMINISTRADOR',
        ]);
    }
}
