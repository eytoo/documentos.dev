<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPago extends Model {

	protected $table = 'tipo_pagos';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}