<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table   = "routes";
    public $timestamps = false;

    public function destino()
    {
        return $this->hasOne(Punto::class, "id", "destinations_id");
    }

    public function origen()
    {
        return $this->hasOne(Punto::class, "id", "sources_id");
    }
}
