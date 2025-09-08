<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required'
        ]);

        $user = Usuario::where('correo', $request->correo)
            ->where('activo', 1)
            ->first();

        if ($user && Hash::check($request->contrasena, $user->contrasena)) {
            session()->put('usuario', $user); // Guardamos el objeto en sesión

            // Redirige según rol
            switch ($user->rol) {
                case 'administrador':
                    return redirect('/admin');
                case 'supervisor':
                    return redirect('/supervisor');
                case 'capturista':
                    return redirect('/capturista');
                default:
                    return redirect('/login')->with('error', 'Rol no válido');
            }
        } else {
            return back()->with('error', 'Correo o contraseña incorrectos');
        }
    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect('/login');
    }
}
