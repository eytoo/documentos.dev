<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    protected $table   = 'comments';
    public $timestamps = false;

    //use SoftDeletes;

    //protected $dates = ['deleted_at'];

}
