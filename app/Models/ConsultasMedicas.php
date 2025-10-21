<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultasMedicas extends Model
{
    use HasFactory;

    protected $table = 'consultas_medicas';

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'fecha_hora',
        'motivo_consulta',
        'diagnostico',
        'tratamiento_sugerido',
    ];

    public function paciente()
    {
        return $this->belongsTo(Pacientes::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medicos::class);
    }

    public function imagenes()
    {
        return $this->hasMany(\App\Models\Imagenes::class, 'consulta_id');
    }

}
