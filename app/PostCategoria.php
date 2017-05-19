<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategoria extends Model
{

    protected $table      = 'post_categorias';
    public $timestamps    = true;
    protected $primaryKey = 'pos_cat_id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
