<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;

    protected $table = 'entrenadores';
    protected $primaryKey = 'id_entrenador';

    protected $fillable = [
        'id_persona',
        'id_usuario',
        'especialidad',
        'experiencia',
        'disponibilidad',
        'estado',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
