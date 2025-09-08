<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    protected $table = 'materias_primas';
    protected $primaryKey = 'id_materia_prima';
    public $timestamps = true;

    protected $fillable = ['id_ingrediente', 'cantidad_total', 'unidad_medida'];

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class, 'id_ingrediente', 'id_ingrediente');
    }

    public function recepciones()
    {
        return $this->hasMany(Recepcion::class, 'id_materia_prima', 'id_materia_prima');
    }
}
