<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    use App\Models\Cliente;


class Notificacion extends Model
{


public function showForm()
{
    $clientes = Cliente::all(); // Traemos todos los clientes para seleccionar a quién enviar
    return view('notificaciones.send', compact('clientes'));
}

    protected $table = 'notificaciones';

    protected $fillable = [
        'id_cliente',
        'tipo',
        'mensaje',
        'fecha_envio',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
