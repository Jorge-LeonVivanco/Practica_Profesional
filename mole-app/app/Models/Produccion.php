<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table = 'producciones';
    protected $primaryKey = 'id_produccion';
    public $timestamps = true;

    protected $fillable = [
        'tipo_producto',
        'cantidad_total',
        'estado',
        'lote_generado',
        'responsable',
        'turno',
        'maquinaria_usada',
        'observaciones'
    ];

    // Relación con ingredientes_produccion
    public function ingredientes()
    {
        return $this->hasMany(\App\Models\IngredienteProduccion::class, 'id_produccion', 'id_produccion');
    }
}
