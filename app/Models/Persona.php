<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use SoftDeletes;

    protected $table = 'personas';

    protected $primaryKey = 'id_persona';  // Clave primaria correcta

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre_completo',
        'apellido_paterno',
        'apellido_materno',
        'ci',
        'telefono',
        'genero',
        'fecha_nacimiento',
    ];

    protected $dates = ['deleted_at'];
}
