<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriaPrima;
use App\Models\Recepcion;
use App\Models\Ingrediente;

class RecepcionController extends Controller
{

    public function index()
    {
        $recepciones = \App\Models\Recepcion::with('materiaPrima.ingrediente')->get();
        return view('capturista.recepciones.index', compact('recepciones'));
    }


    public function create()
    {
        $ingredientes = Ingrediente::all();
        return view('capturista.recepciones.create', compact('ingredientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ingrediente' => 'required|exists:ingredientes,id_ingrediente',
            'cantidad_recibida' => 'required|numeric|min:0.01',
            'fecha_recepcion' => 'required|date',
            'evaluado_por' => 'nullable|string',
            'resultado_evaluacion' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'estado' => 'nullable|string',
            'ubicacion_estante' => 'nullable|string',
            'temperatura_recomendada' => 'nullable|string',
            'certificado_calidad' => 'nullable|boolean',
            'fecha_ingreso' => 'required|date',
            'fecha_vencimiento' => 'nullable|date',
            'unidad_medida' => 'required|string',
            'lote_proveedor' => 'nullable|string',
        ]);

        // Obtener o crear materia prima solo por ingrediente
        $materia = MateriaPrima::firstOrCreate(
            ['id_ingrediente' => $request->id_ingrediente],
            [
                'cantidad_total' => 0,
                'unidad_medida' => $request->unidad_medida,
            ]
        );

        // Sumar cantidad
        $materia->cantidad_total += $request->cantidad_recibida;
        $materia->save();

        // Registrar la recepción completa
        Recepcion::create([
            'id_materia_prima' => $materia->id_materia_prima,
            'fecha_recepcion' => $request->fecha_recepcion,
            'cantidad_recibida' => $request->cantidad_recibida,
            'evaluado_por' => $request->evaluado_por,
            'resultado_evaluacion' => $request->resultado_evaluacion,
            'observaciones' => $request->observaciones,
            'estado' => $request->estado,
            'ubicacion_estante' => $request->ubicacion_estante,
            'temperatura_recomendada' => $request->temperatura_recomendada,
            'certificado_calidad' => $request->certificado_calidad ?? 0,
            'fecha_ingreso' => $request->fecha_ingreso,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'unidad_medida' => $request->unidad_medida,
            'lote_proveedor' => $request->lote_proveedor,
        ]);

        return redirect()->route('capturista.recepciones.index')->with('success', 'Recepción registrada correctamente.');
    }

}
