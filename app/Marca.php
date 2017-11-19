<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model {

	protected $table = "cars_brands";

	public $timestamps = false;

	public function carro() 
    {
        return $this->hasOne(Carro::class,"id","cars_brands_id");
    }
}