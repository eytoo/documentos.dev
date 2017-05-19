<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VentaCab extends Model {

	protected $table = 'ventas_cab';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}