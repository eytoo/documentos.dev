<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rubro extends Model {

	protected $table = 'rubros';
	public $timestamps = true;
    protected $primaryKey = 'rubro_id';

    use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function categoria(){
	    return $this->hasMany(Categoria::class,"rubro_id");
    }

}