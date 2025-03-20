<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoviminetoCaja extends Model
{
    //
    public function arqueo(){
        return $this->belongsTo(Arqueo::class);
    }
}
