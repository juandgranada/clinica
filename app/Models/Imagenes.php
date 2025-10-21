<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;

    protected $table = 'imagenes';
    protected $primaryKey = 'id_imagen';

    protected $fillable = [
        'consulta_id',
        'ruta_imagen',
        'tipo_imagen',
        'descripcion',
        'fecha_carga'
    ];

    public $timestamps = false;
}


