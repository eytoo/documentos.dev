<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reportado extends Model 
{

    protected $table = 'reportados';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}