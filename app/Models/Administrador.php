<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administradores'; // 👈 nombre real de la tabla

    protected $primaryKey = 'id_administrador'; // 👈 clave primaria

    public $timestamps = true;

    protected $fillable = [
        'id_persona',
        'id_usuario',
        'nivel_acceso',
        'area_responsable',
        'estado'
    ];

    // Relaciones

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona', 'id_persona');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    
}
