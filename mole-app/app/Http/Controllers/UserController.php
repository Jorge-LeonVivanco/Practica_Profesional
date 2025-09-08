<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Listado de usuarios
    public function index()
    {
        $users = Usuario::all(); // Trae todos los usuarios de la DB
        return view('admin.usuarios.index', compact('users'));
    }

    // Mostrar formulario para crear un usuario
    public function create()
    {
        return view('admin.usuarios.create');
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:usuarios,correo',
            'rol' => 'required|in:administrador,supervisor,capturista',
            'contrasena' => 'required|min:6|confirmed'
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'rol' => $request->rol,
            'contrasena' => Hash::make($request->contrasena),
            'activo' => 1
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    // Mostrar formulario de edición
    public function edit(Usuario $user)
    {
        return view('admin.usuarios.edit', compact('user'));
    }

    // Actualizar usuario
    public function update(Request $request, Usuario $user)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:usuarios,correo,' . $user->id_usuario . ',id_usuario',
            'rol' => 'required|in:administrador,supervisor,capturista',
            'contrasena' => 'nullable|min:6|confirmed'
        ]);

        $user->nombre = $request->nombre;
        $user->correo = $request->correo;
        $user->rol = $request->rol;

        if ($request->filled('contrasena')) {
            $user->contrasena = Hash::make($request->contrasena);
        }

        $user->save();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar usuario
    public function destroy(Usuario $user)
    {
        $user->delete();
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}
