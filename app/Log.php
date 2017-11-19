<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $table   = 'log';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
