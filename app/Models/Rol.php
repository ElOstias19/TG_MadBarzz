<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use HasFactory, SoftDeletes; // Activamos SoftDeletes

    protected $table = 'roles';

    protected $fillable = [
        'nombre',
    ];

    protected $dates = ['deleted_at']; // Campo de eliminación lógica
}
