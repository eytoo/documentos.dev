<?php

namespace App\Http\Controllers\Front;

use App\Curso;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function getIndex()
    {
        $cursos = Curso::take(5)->with("profesor", "categoria")->orderBy("created_at", "desc")->get();
        $post   = Post::take(5)->with("profesor", "categoria")->orderBy("created_at", "desc")->get();
        return view("frontend.home.index")->with(compact("cursos", "post"));
    }

    public function getIndexLogin()
    {
        //return view("frontend.home.index")
        dd(Auth::guard("client")->user());
    }

    public function getNosotros()
    {
      return view("frontend.nosotros.nosotros");
    }

    public function getFaq()
    {
      return view("frontend.faq.faq");
    }
}
