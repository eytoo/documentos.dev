<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leccion extends Model {

	protected $table = 'lecciones';
	public $timestamps = true;
	protected $primaryKey = "lec_id";

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}