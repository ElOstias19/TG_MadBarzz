<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Membresia extends Model
{
     use SoftDeletes;

    protected $table = 'membresias';
    protected $primaryKey = 'id_membresia';

    protected $fillable = [
        'tipo_membresia',
        'precio',
    ];

    public function clientes()
    {
        return $this->hasMany(MembresiaCliente::class, 'id_membresia', 'id_membresia');
    }
}
