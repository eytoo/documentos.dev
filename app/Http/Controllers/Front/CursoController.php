<?php

namespace App\Http\Controllers\Front;

use App\Curso;
use App\Http\Controllers\Controller;
use App\Comentario;
use Auth;

class CursoController extends Controller
{
    public function getIndex()
    {
        $cursos = Curso::take(5)->with("profesor", "categoria")->orderBy("created_at", "desc")->get();
        return view("frontend.home.index")->with(compact("cursos"));
    }

    /**
     * Muestra un curso en la página principal
     *
     * @param string $url
     * @return view
     */
    public function getCurso($url)
    {
        $curso     = Curso::where("cur_url", $url)->with("profesor", "categoria")->first();
        $relcursos = Curso::where("cat_id", $curso->cat_id)->with("profesor", "categoria")->get();
        $ultimos   = collect();
        if (!count($relcursos)) {
            $ultimos = Curso::take(3)->with("profesor", "categoria")->orderBy("created_at", "desc")->get();
        }
        $comentarios = Comentario::where("com_tipo","curso")
                                  ->where("com_cont_id",$curso->cur_id)
                                  ->orderBy("created_at","desc")
                                  ->get();
        $comchild = $comentarios->where("com_parent_id","<>",0);
        $comchild->all();
        return view("frontend.curso.curso_detalle")->with(compact("curso", "relcursos", "ultimos","comentarios","comchild"));
    }
}
