<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profesor extends Model
{

    protected $table      = 'profesores';
    public $timestamps    = true;
    protected $primaryKey = "prof_id";

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function curso()
    {
        return $this->hasMany(Curso::class, "prof_id");
    }

}
