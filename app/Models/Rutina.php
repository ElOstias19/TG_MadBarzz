<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rutina extends Model
{
    use HasFactory, SoftDeletes; // <-- Agregado SoftDeletes

    protected $table = 'rutinas';
    protected $primaryKey = 'id_rutina';

    protected $fillable = [
        'id_entrenador',
        'titulo',
        'descripcion',
        'archivo',
        'fecha_subida',
    ];

    protected $casts = [
        'fecha_subida' => 'datetime',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime', // <-- Agregado para soft deletes
    ];

    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class, 'id_entrenador');
    }

    public function rutinas()
    {
        return $this->hasMany(Rutina::class, 'id_entrenador', 'id_entrenador');
    }
}
