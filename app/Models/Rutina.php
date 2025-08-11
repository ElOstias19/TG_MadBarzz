<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
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
