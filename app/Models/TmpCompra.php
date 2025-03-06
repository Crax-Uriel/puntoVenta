<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmpCompra extends Model
{
    protected $fillable = ['cantidad_compra', 'producto_id', 'session_id'];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
