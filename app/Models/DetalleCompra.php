<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $fillable = [ 
        'cantidad_compra',
        'precio_compra',
        'compra_id',
        'producto_id',
        'proveedor_id'
    ];

    public function compra(){
        return $this->belongsTo(Compra::class);
    }
    
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
    /*public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }*/
}
