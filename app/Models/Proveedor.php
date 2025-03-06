<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [ 
        'nombre_proveedor',
        'empresa',
        'telefono_proveedor',
        'correo_electronico'
    ];

    public function compras(){
        return $this->hasMany(Compra::class);
    }
}
