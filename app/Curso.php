<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model {

	protected $table = 'cursos';
	public $timestamps = true;
	protected $primaryKey = "cur_id";

	use SoftDeletes;

	protected $dates = ['deleted_at'];

    public function categoria(){
        return $this->hasOne(Categoria::class,"cat_id","cat_id");
    }

}