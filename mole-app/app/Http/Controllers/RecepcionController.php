<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepcion;
use App\Models\MateriaPrima;
use App\Models\Ingrediente;
use App\Models\Proveedor;

class RecepcionController extends Controller
{
 // =========================
    // Capturista - Listado
    // =========================
    public function indexCapturista()
    {
        $recepciones = Recepcion::with(['materiaPrima.ingrediente', 'materiaPrima'])
            ->orderBy('fecha_recepcion', 'desc')
            ->get();

        return view('capturista.recepciones.index', compact('recepciones'));
    }

    // =========================
    // Capturista - Crear
    // =========================
    public function create()
    {
        $ingredientes = Ingrediente::where('activo',1)->orderBy('nombre')->get();
        $proveedores = Proveedor::orderBy('nombre')->get();

        return view('capturista.recepciones.create', compact('ingredientes','proveedores'));
    }

    // =========================
    // Capturista - Guardar
    // =========================
// =========================
// Capturista - Guardar
// =========================
public function store(Request $request)
{
    $request->validate([
        'id_ingrediente' => 'required|exists:ingredientes,id_ingrediente',
        'id_proveedor' => 'nullable|exists:proveedores,id_proveedor',
        'cantidad_recibida' => 'required|numeric|min:0.01',
        'fecha_recepcion' => 'required|date',
        'fecha_ingreso_inventario' => 'required|date', // <-- obligatorio y separado
        'unidad_medida' => 'required|string',
        'lote_proveedor' => 'nullable|string',
        'estado' => 'nullable|string',
        'observaciones' => 'nullable|string',
        'temperatura_recomendada' => 'nullable|string',
        'ubicacion_estante' => 'nullable|string',
        'certificado_calidad' => 'nullable|boolean',
        'fecha_vencimiento' => 'nullable|date',
        'evaluado_por' => 'nullable|string',
        'resultado_evaluacion' => 'nullable|string',
        'cantidad_inicial' => 'nullable|numeric',
    ]);

    // Buscar o crear la materia prima
    $materia = MateriaPrima::firstOrCreate(
        ['id_ingrediente' => $request->id_ingrediente],
        [
            'unidad_medida' => $request->unidad_medida,
            'cantidad_total' => 0
        ]
    );

    // Crear la recepción
    $recepcion = Recepcion::create([
        'id_materia_prima' => $materia->id_materia_prima,
        'id_proveedor' => $request->id_proveedor,
        'cantidad_recibida' => $request->cantidad_recibida,
        'fecha_recepcion' => $request->fecha_recepcion,
        'fecha_ingreso_inventario' => $request->fecha_ingreso_inventario, // <-- independiente
        'evaluado_por' => $request->evaluado_por,
        'unidad_medida' => $request->unidad_medida,
        'lote_proveedor' => $request->lote_proveedor,
        'estado' => $request->estado,
        'observaciones' => $request->observaciones,
        'temperatura_recomendada' => $request->temperatura_recomendada,
        'ubicacion_estante' => $request->ubicacion_estante,
        'certificado_calidad' => $request->has('certificado_calidad') ? 1 : 0,
        'fecha_vencimiento' => $request->fecha_vencimiento,
        'resultado_evaluacion' => $request->resultado_evaluacion,
        'cantidad_inicial' => $request->cantidad_inicial ?? 0,
    ]);

    // Actualizar inventario automáticamente
    $materia->cantidad_total += $request->cantidad_recibida;
    $materia->save();

    return redirect()->route('capturista.recepciones.index')
        ->with('success', 'Recepción registrada correctamente y el inventario se actualizó.');
}


    // =========================
    // Admin - Listado
    // =========================
    public function indexAdmin()
    {
        $recepciones = Recepcion::with(['materiaPrima.ingrediente','materiaPrima'])
            ->orderBy('fecha_recepcion','desc')
            ->get();

        return view('admin.recepciones.index', compact('recepciones'));
    }

    // =========================
    // Admin - Editar
    // =========================
    public function editAdmin(Recepcion $recepcion)
    {
        $ingredientes = Ingrediente::where('activo',1)->orderBy('nombre')->get();
        $proveedores = Proveedor::orderBy('nombre')->get();

        return view('admin.recepciones.edit', compact('recepcion','ingredientes','proveedores'));
    }

    // =========================
    // Admin - Actualizar
    // =========================
    public function updateAdmin(Request $request, Recepcion $recepcion)
    {
        $request->validate([
            'cantidad_recibida' => 'required|numeric|min:0.01',
            'estado' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        // Ajustar inventario
        $materia = $recepcion->materiaPrima;
        $materia->cantidad_total -= $recepcion->cantidad_recibida; // restar vieja cantidad
        $materia->cantidad_total += $request->cantidad_recibida;   // sumar nueva cantidad
        $materia->save();

        $recepcion->update($request->only([
            'cantidad_recibida','estado','observaciones','fecha_vencimiento','lote_proveedor'
        ]));

        return redirect()->route('admin.recepciones.index')
            ->with('success','Recepción actualizada correctamente.');
    }

    // =========================
    // Admin - Eliminar
    // =========================
    public function destroyAdmin(Recepcion $recepcion)
    {
        $materia = $recepcion->materiaPrima;
        $materia->cantidad_total -= $recepcion->cantidad_recibida; // restar del inventario
        $materia->save();

        $recepcion->delete();

        return redirect()->route('admin.recepciones.index')
            ->with('success','Recepción eliminada correctamente.');
    }
}
