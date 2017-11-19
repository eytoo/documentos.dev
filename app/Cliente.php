<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table   = "clients";
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, "id", "users_id");
    }

    public function carrera()
    {
        return $this->hasOne(Carrera::class, "clie_id", "id");
    }

    public function gratis()
    {
        return $this->hasOne(Premio::class, "user_id", "users_id");
    }
}
