<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table   = "client_card";
    public $timestamps = false;

    protected $hidden = [
        'codigo',
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
