<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model {

	protected $table = "cars_models";

	public $timestamps = false;

	public function carro() 
    {
        return $this->hasOne(Carro::class,"id","cars_models_id");
    }

}