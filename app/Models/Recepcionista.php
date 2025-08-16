<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recepcionista extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_recepcionista';
    protected $fillable = [
        'id_persona',
        'id_usuario',
        'turno',
        'punto_atencion',
        'estado'
    ];
 protected $dates = ['deleted_at']; // opcional, Laravel lo infiere


    public function persona() {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
