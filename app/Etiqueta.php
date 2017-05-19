<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etiqueta extends Model {

	protected $table = 'etiquetas';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}