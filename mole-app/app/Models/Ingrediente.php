<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $primaryKey = 'id_ingrediente';
    protected $table = 'ingredientes';

    protected $fillable = ['nombre', 'unidad_medida'];

    public function materiaPrima()
    {
        return $this->hasOne(MateriaPrima::class, 'id_ingrediente');
    }

    public function recepciones()
    {
        return $this->hasManyThrough(Recepcion::class, MateriaPrima::class, 'id_ingrediente', 'id_materia_prima');
    }
}
