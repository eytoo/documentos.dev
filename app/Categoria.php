<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{

    protected $table      = 'categorias';
    public $timestamps    = true;
    protected $primaryKey = 'cat_id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function rubro()
    {
        return $this->belongsTo(Rubro::class, "rubro_id");
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, "cat_id");
    }

}
