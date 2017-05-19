<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tema extends Model {

	protected $table = 'temas';
	public $timestamps = true;
    protected $primaryKey = "tema_id";

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}