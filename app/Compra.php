<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use SoftDeletes;
    protected $table = "compras";


   	public function detcompra(){
   		return $this->hasOne(Detcompra::class);
   	}

   	public function productor(){
   		return $this->belongsTo(Productor::class);
   	}
}
