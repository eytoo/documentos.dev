<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suscripcion extends Model {

	protected $table = 'suscripciones';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}