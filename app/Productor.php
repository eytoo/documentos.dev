<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productor extends Model
{
    use SoftDeletes;

    protected $table = "productores";

    public function compra(){
   		return $this->hasOne(Productor::class);
   	}
}
