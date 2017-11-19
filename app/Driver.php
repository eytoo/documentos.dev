<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{

    protected $table = "drivers";

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, "id", "users_id");
    }

    public function userl()
    {
        return $this->belongsTo(Userl::class);
    }

    public function carro()
    {
        return $this->belongsTo(Carro::class, "id", "drivers_id");
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
