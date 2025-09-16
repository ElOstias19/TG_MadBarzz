<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
        use SoftDeletes;

    protected $table = 'pagos';
    protected $primaryKey = 'id_pago';

    protected $fillable = [
        'id_cliente',
        'id_membresia',
        'monto',
        'fecha_pago',
        'metodo_pago',
        'observaciones',
        'imagen_qr',
    ];
protected $casts = [
    'fecha_pago' => 'date',
];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function membresia()
    {
        return $this->belongsTo(Membresia::class, 'id_membresia');
    }
}
