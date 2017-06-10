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
    protected $hidden = array('user_password');

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, "id","user_id");
    }

}
