<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngredienteProduccion extends Model
{
    protected $table = 'ingredientes_produccion';
    protected $primaryKey = 'id_ingrediente_produccion';
    public $timestamps = true;

    protected $fillable = [
        'id_produccion',
        'id_materia_prima',
        'cantidad_utilizada'
    ];

    public function produccion()
    {
        return $this->belongsTo(\App\Models\Produccion::class, 'id_produccion', 'id_produccion');
    }

    public function materiaPrima()
    {
        return $this->belongsTo(\App\Models\MateriaPrima::class, 'id_materia_prima', 'id_materia_prima');
    }
}
