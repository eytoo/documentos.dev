<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model {

	protected $table = "cars";

	public $timestamps = false;

	public function driver() 
    {
        return $this->hasOne(Driver::class,"driver_id","id");
    }

    public function modelo() 
    {
        return $this->belongsTo(Modelo::class,"cars_models_id","id");
    }

    public function marca() 
    {
        return $this->belongsTo(Marca::class,"cars_brands_id","id");
    }
}