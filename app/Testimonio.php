<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonio extends Model {

	protected $table = 'testimonios';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}