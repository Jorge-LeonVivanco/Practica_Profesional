<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table = 'ingredientes';
    protected $primaryKey = 'id_ingrediente';
    public $timestamps = true;

    protected $fillable = ['nombre', 'unidad_medida', 'categoria', 'activo'];

    public function materiasPrimas()
    {
        return $this->hasMany(MateriaPrima::class, 'id_ingrediente', 'id_ingrediente');
    }
}
