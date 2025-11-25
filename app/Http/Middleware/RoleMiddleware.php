<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Maneja la solicitud según rol.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->rol; // campo 'rol' en tu tabla usuarios

        // Si el usuario NO tiene uno de los roles permitidos
        if (!in_array($userRole, $roles)) {
            return abort(403, 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}
