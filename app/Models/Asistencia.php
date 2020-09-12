<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencia';

    protected $fillable = [
        'culto_id', 'hermano_id', 'temperatura', 'sintomas', 'contacto_personas_infectadas'
    ];

    public function culto() {
        return $this->belongsTo('App\Models\Culto');
    }

    public function hermano() {
        return $this->belongsTo('App\Models\Hermano');
    }
}
