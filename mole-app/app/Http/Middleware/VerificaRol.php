<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Usuario;

class VerificaRol
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        /** @var Usuario|null $usuario */
        $usuario = session('usuario');

        if (!$usuario instanceof Usuario || !in_array($usuario->rol, $roles)) {
            return redirect('/login')->with('error', 'Acceso no autorizado');
        }

        return $next($request);
    }
}
