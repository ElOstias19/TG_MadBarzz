<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'id_persona',
        'id_usuario',
        'dias_asistidos',
        'huella_digital',
        'estado',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario')->withTrashed();
    }

    public function membresiaActual()
    {
        return $this->hasOne(MembresiaCliente::class, 'id_cliente')
                ->where('fecha_fin', '>=', now())
                ->latest();
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'id_cliente');
    }
}
