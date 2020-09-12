<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Culto extends Model
{
    protected $fillable = [
        'fecha', 'hora', 'titulo', 'dirigido', 'url', 'pico_cedula', 'ofrenda'
    ];
}
