<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{

    protected $table      = 'users';
    public $timestamps    = true;
    protected $primaryKey = "id";

    use SoftDeletes;

    protected $dates  = ['deleted_at'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, "id", "user_id");
    }

    public function driver()
    {
        return $this->hasOne(Driver::class, "users_id", "id");
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, "users_id", "id");
    }

    public function cards()
    {
        return $this->hasMany(Card::class, "user_id", "id");
    }

}
