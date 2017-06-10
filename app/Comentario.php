<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{

    protected $table   = 'comentarios';
    public $timestamps = true;
    protected $primaryKey = "com_id";

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
