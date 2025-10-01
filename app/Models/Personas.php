<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'telefono',
        'email'
    ];

    public function medico()
    {
        return $this->hasOne(Medicos::class, 'persona_id');
    }

    public function paciente()
    {
        return $this->hasOne(Pacientes::class, 'persona_id');
    }
}
