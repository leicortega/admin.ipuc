<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hermano extends Model
{
    protected $fillable = [
        'identificacion', 'nombre', 'telefono', 'direccion', 'fecha_nacimiento', 'tipo', 'bautizado'
    ];
}
