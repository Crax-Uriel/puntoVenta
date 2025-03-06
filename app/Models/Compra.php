<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [ 
        'fecha_compra',
        'comprobante_compra',
        'precio_total'
    ];

    public function detalles(){
        return $this->hasMany(DetalleCompra::class);
    }
    
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
    
}
