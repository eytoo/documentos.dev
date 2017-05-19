<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planta extends Model
{
    use SoftDeletes;
    protected $table = "plantas";

    public function venta(){
   		return $this->hasOne(Planta::class);
   	}
}
