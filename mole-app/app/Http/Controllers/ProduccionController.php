<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produccion;
use App\Models\MateriaPrima;

class ProduccionController extends Controller
{
    public function create()
    {
        // Traemos todas las materias primas con ingrediente
        $materiasPrimas = MateriaPrima::with('ingrediente')->get();

        return view('supervisor.produccion.create', compact('materiasPrimas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_producto' => 'required|string',
            'materias' => 'required|array',
            'materias.*.id_materia_prima' => 'required|exists:materias_primas,id_materia_prima',
        ]);

        // Crear producción (sin cantidad por ahora)
        Produccion::create([
            'tipo_producto' => $request->tipo_producto,
            'cantidad_total' => 0,
            'estado' => 'En proceso',
            'lote_generado' => strtoupper(\Illuminate\Support\Str::random(6)),
            'responsable' => auth()->user()->nombre ?? 'Supervisor',
            'turno' => now()->format('H:i'),
        ]);

        return redirect()->route('supervisor.dashboard')
            ->with('success', 'Producción registrada correctamente (ingredientes aún sin cantidad).');
    }
}
