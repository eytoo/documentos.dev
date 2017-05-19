<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detcompra extends Model
{
   	public function compra(){
   		return $this->belongsTo(Compra::class);
   	}
}
