<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [ 
        'nombre_cliente',
        'apellido_paterno_cliente',
        'apellido_materno_cliente',
        'rfc',
        'telefono_cliente',
        'correo_electronico',
    ];

}
