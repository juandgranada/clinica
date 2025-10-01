<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $fillable = [
        'persona_id',
        'seguro_medico',
        'contacto_emergencia'
    ];

    public function persona()
    {
        return $this->belongsTo(Personas::class, 'persona_id');
    }
}
