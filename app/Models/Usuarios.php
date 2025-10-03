<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'persona_id',
        'username',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
    ];

    // Relación con Personas
    public function persona()
    {
        return $this->belongsTo(Personas::class, 'persona_id');
    }
}

