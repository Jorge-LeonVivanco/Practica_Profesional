<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    protected $primaryKey = 'id_materia_prima';
    protected $table = 'materias_primas';

    protected $fillable = [
        'id_ingrediente',
        'cantidad_total',
        'unidad_medida',
    ];

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class, 'id_ingrediente');
    }

    public function recepciones()
    {
        return $this->hasMany(Recepcion::class, 'id_materia_prima');
    }
    
}
