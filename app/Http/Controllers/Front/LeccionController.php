<?php

namespace App\Http\Controllers\Front;

use App\Curso;
use App\Http\Controllers\Controller;
use App\Comentario;
use Auth;

class LeccionController extends Controller
{
    public function getIndex()
    {
        return view("frontend.leccion.leccion_detalle");
    }

}
