<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $primaryKey = 'id_recepcion';
    protected $table = 'recepciones';

    protected $fillable = [
        'id_materia_prima', 'fecha_recepcion', 'cantidad_recibida',
        'evaluado_por', 'resultado_evaluacion', 'observaciones',
        'estado', 'ubicacion_estante', 'temperatura_recomendada',
        'certificado_calidad', 'fecha_ingreso', 'fecha_vencimiento',
        'unidad_medida', 'lote_proveedor'
    ];

    public function materiaPrima()
    {
        return $this->belongsTo(MateriaPrima::class, 'id_materia_prima');
    }
}

