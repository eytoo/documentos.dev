<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //

    public function planta(){
   		return $this->belongsTo(Planta::class);
   	}
}
