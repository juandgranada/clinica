<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    protected $fillable = [
        'persona_id',
        'tarjeta_profesional',
        'especialidad'
    ];

    public function persona()
    {
        return $this->belongsTo(Personas::class, 'persona_id');
    }

    public function consultasMedicas()
    {
        return $this->hasMany(ConsultasMedicas::class);
    }

}
