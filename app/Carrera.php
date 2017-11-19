<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table   = "rides";
    public $timestamps = true;

    public function cliente()
    {
        return $this->hasOne(Cliente::class, "id", "clie_id");
    }

    public function driver()
    {
        return $this->hasOne(Driver::class, "id", "drivers_id");
    }

    public function ruta()
    {
        return $this->hasOne(Ruta::class, "id", "routes_id");
    }
}
