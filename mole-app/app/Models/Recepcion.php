<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $table = 'recepciones';
    protected $primaryKey = 'id_recepcion';
    public $timestamps = true;

    protected $fillable = [
        'id_materia_prima',
        'cantidad_recibida',
        'fecha_recepcion',
        'evaluado_por',
        'resultado_evaluacion',
        'observaciones',
        'cantidad_inicial',
        'estado',
        'ubicacion_estante',
        'temperatura_recomendada',
        'certificado_calidad',
        'fecha_ingreso_inventario',
        'fecha_vencimiento',
        'unidad_medida',
        'lote_proveedor',
        'id_proveedor'
    ];

    public function materiaPrima()
    {
        return $this->belongsTo(MateriaPrima::class, 'id_materia_prima', 'id_materia_prima');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor', 'id_proveedor');
    }

}
