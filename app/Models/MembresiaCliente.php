<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembresiaCliente extends Model
{
    use SoftDeletes;

    protected $table = 'membresia_cliente';

    protected $fillable = [
        'id_cliente',
        'id_membresia',
        'fecha_inicio',
        'fecha_fin',
        'nombre_descuento',   // Nombre del descuento (ej. UAGRM)
        'descuento',          // Porcentaje descuento (ej. 20.00)
        'precio_final',       // Precio final después del descuento
    ];

    // Relaciones

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function membresia()
    {
        return $this->belongsTo(Membresia::class, 'id_membresia', 'id_membresia');
    }
}
