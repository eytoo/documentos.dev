<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model {

	protected $table = 'comentarios';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}