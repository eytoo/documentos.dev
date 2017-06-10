<?php

namespace App\Http\Controllers\Front;

use App\Curso;
use App\Http\Controllers\Controller;
use App\Comentario;
use App\Post;

class BlogController extends Controller
{
    public function getIndex()
    {
        $cursos = Curso::take(5)->with("profesor", "categoria")->orderBy("created_at", "desc")->get();
        return view("frontend.home.index")->with(compact("cursos"));
    }

    /**
     * Muestra un post en la página principal
     *
     * @param string $url
     * @return view
     */
    public function getPost($url)
    {
        $post    = Post::where("post_url", $url)->with("profesor", "categoria")->first();
        $relpost = Post::where("post_cat_id", $post->post_cat_id)
            ->where("post_id", "<>", $post->post_id)
            ->with("profesor", "categoria")
            ->take(3)
            ->get();
        $ultimos = collect();
        if (!count($relpost)) {
            $ultimos = Post::take(3)->with("profesor", "categoria")->orderBy("created_at", "desc")->get();
        }
        $comentarios = Comentario::where("com_tipo","post")
                                  ->where("com_cont_id",$post->post_id)
                                  ->orderBy("created_at","desc")
                                  ->get();
        $comchild = $comentarios->where("com_parent_id","<>",0);
        $comchild->all();
        return view("frontend.blog.post")->with(compact("post", "relpost", "ultimos","comentarios","comchild"));
    }
}
