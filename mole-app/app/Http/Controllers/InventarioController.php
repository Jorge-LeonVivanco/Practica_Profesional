<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    /**
     * Mostrar inventario para Capturista
     */
    public function mostrarInventarioCapturista()
    {
        $materiasPrimas = DB::table('materias_primas')
            ->join('ingredientes', 'materias_primas.id_ingrediente', '=', 'ingredientes.id_ingrediente')
            ->select(
                'ingredientes.nombre as nombre_ingrediente',
                'ingredientes.unidad_medida',
                'materias_primas.cantidad_total'
            )
            ->orderBy('ingredientes.nombre')
            ->get();

        return view('capturista.materias_primas.index', compact('materiasPrimas'));
    }

    /**
     * Mostrar inventario para Administrador
     */
    public function mostrarInventarioAdmin()
    {
        $materiasPrimas = DB::table('materias_primas')
            ->join('ingredientes', 'materias_primas.id_ingrediente', '=', 'ingredientes.id_ingrediente')
            ->select(
                'ingredientes.nombre as nombre_ingrediente',
                'ingredientes.unidad_medida',
                'materias_primas.cantidad_total'
            )
            ->orderBy('ingredientes.nombre')
            ->get();

        return view('admin.materias_primas.index', compact('materiasPrimas'));
    }
}
