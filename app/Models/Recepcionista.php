<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Recepcionista extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_recepcionista';
    protected $fillable = [
        'id_persona',
        'id_usuario',
        'turno',
        'punto_atencion',
        'estado'
    ];

    public function persona() {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
