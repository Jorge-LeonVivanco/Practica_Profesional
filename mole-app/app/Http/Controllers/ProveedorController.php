<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    // Listado de proveedores
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('admin.proveedores.index', compact('proveedores'));
    }

    // Formulario para crear nuevo proveedor
    public function create()
    {
        return view('admin.proveedores.create');
    }

    // Guardar nuevo proveedor
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
        ]);

        Proveedor::create($request->all());
        return redirect()->route('admin.proveedores.index')->with('success', 'Proveedor creado correctamente');
    }

    // Formulario para editar proveedor
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('admin.proveedores.edit', compact('proveedor'));
    }

    // Actualizar proveedor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());
        return redirect()->route('admin.proveedores.index')->with('success', 'Proveedor actualizado correctamente');
    }

    // Eliminar proveedor
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return redirect()->route('admin.proveedores.index')->with('success', 'Proveedor eliminado correctamente');
    }
}
