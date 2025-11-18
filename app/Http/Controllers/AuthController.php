<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function loginForm()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Intentar autenticación
        if (Auth::attempt($credentials)) {

            // Regenerar sesión por seguridad
            $request->session()->regenerate();

            // Redirigir según rol
            switch (Auth::user()->rol) {
                case 'ADMINISTRADOR':
                    return redirect()->route('dashboard');

                case 'MEDICO':
                    return redirect()->route('consultas_medicas.index');

                case 'PACIENTE':
                    return redirect()->route('pacientes.index');

                default:
                    return redirect()->route('dashboard');
            }
        }

        // Error si no coincide usuario o contraseña
        return back()->withErrors([
            'loginError' => 'Usuario o contraseña incorrectos.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

