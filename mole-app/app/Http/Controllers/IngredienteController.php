<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingrediente;

class IngredienteController extends Controller
{
    // Listar ingredientes
    public function index()
    {
        $ingredientes = Ingrediente::orderBy('nombre')->get();
        return view('admin.ingredientes.index', compact('ingredientes'));
    }

    // Formulario crear
    public function create()
    {
        return view('admin.ingredientes.create');
    }

    // Guardar nuevo ingrediente
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:ingredientes,nombre',
            'unidad_medida' => 'required|string|max:20',
            'categoria' => 'nullable|string|max:50',
        ]);

        Ingrediente::create([
            'nombre' => $request->nombre,
            'unidad_medida' => $request->unidad_medida,
            'categoria' => $request->categoria,
            'activo' => 1,
        ]);

        return redirect()->route('admin.ingredientes.index')->with('success', 'Ingrediente creado correctamente.');
    }

    // Formulario editar
    public function edit(Ingrediente $ingrediente)
    {
        return view('admin.ingredientes.edit', compact('ingrediente'));
    }

    // Actualizar ingrediente
    public function update(Request $request, Ingrediente $ingrediente)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:ingredientes,nombre,' . $ingrediente->id_ingrediente . ',id_ingrediente',
            'unidad_medida' => 'required|string|max:20',
            'categoria' => 'nullable|string|max:50',
        ]);

        $ingrediente->update([
            'nombre' => $request->nombre,
            'unidad_medida' => $request->unidad_medida,
            'categoria' => $request->categoria,
        ]);

        return redirect()->route('admin.ingredientes.index')->with('success', 'Ingrediente actualizado correctamente.');
    }

    // Eliminar ingrediente
    public function destroy(Ingrediente $ingrediente)
    {
        $ingrediente->delete();
        return redirect()->route('admin.ingredientes.index')->with('success', 'Ingrediente eliminado correctamente.');
    }
}
