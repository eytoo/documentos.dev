<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    protected $table      = 'posts';
    public $timestamps    = true;
    protected $primaryKey = "post_id";

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function categoria()
    {
        return $this->hasOne(PostCategoria::class, "pos_cat_id", "post_cat_id");
    }

    public function profesor()
    {
        return $this->hasOne(Profesor::class, "prof_id", "prof_id");
    }

}
