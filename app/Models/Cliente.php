<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'id_persona',
        'dias_asistidos',
        'huella_digital',
        'estado',
        'id_usuario',
    ];

    // Relaciones (opcional)
public function persona()
{
    return $this->belongsTo(Persona::class, 'id_persona', 'id_persona');
}


public function usuario()
{
    return $this->belongsTo(User::class, 'id_usuario', 'id');
}





    
}
