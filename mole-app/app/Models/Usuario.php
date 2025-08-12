<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; // tu tabla en SQL Server
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nombre', 'correo', 'contrasena', 'rol', 'activo', 'fecha_creacion'
    ];

    public $timestamps = false; // porque no tienes campos created_at ni updated_at
}
