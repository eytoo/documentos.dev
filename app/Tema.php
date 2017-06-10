<?php

namespace App;

use App\Curso;
use App\Leccion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tema extends Model
{

    protected $table      = 'temas';
    public $timestamps    = true;
    protected $primaryKey = "tema_id";

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function curso()
    {
        return $this->belongsTo(Curso::class, "cur_id", "cur_id");
    }

    public function lecciones()
    {
        return $this->hasMany(Leccion::class, "tema_id", "tema_id");
    }

}
