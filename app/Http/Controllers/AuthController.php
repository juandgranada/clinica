<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            switch (Auth::user()->rol) {
                case 'ADMINISTRADOR':
                    return redirect()->route('dashboard');

                case 'MEDICO':
                    return redirect()->route('dashboard');

                case 'PACIENTE':
                    return redirect()->route('dashboard');

                default:
                    return redirect()->route('dashboard');
            }
        }

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
