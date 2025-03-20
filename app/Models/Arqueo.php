<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arqueo extends Model
{
    protected $fillable = [ 
        'fecha_apertura',
        'fecha_cierre',
        'monto_inicial',
        'monto_final',
        'descripcion'
    ];

    public function movimientos(){
        return $this->hasMany(MoviminetoCaja::class);
    }
}
