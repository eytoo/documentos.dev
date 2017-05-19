<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ErrorPagos extends Model {

	protected $table = 'log_error_pagos';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}