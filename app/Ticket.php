<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $table = "tickets";

    public $timestamps = false;

    public function carrera()
    {
        return $this->hasOne(Carrera::class, "rides_id", "id");
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, "clients_id", "id");
    }
}
