<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostCategoria;
use App\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    private $data = array();
    /**
     * Profesor.Controller constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Entradas";
        $this->data["entity_s"]   = "Entrada";
        $this->data["entity_pro"] = "El";
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->data["dataList"] = Post::all();
        if ($request->has("lista") && $request->input("lista") == "eliminados") {
            $this->data["dataList"] = Post::onlyTrashed()->get();
        }
        return view("admin." . str_slug($this->data["entity_p"]) . ".index")->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->data["categorias"] = PostCategoria::all();
        $this->data["profesores"] = Profesor::all();
        return view("admin." . str_slug($this->data["entity_p"]) . ".create")->with($this->data);
    }

    public function uploadImage(Request $request)
    {
        $data = array();
        if ($request->hasFile('foto')) {
            $data['initial_link'] = $request->file('foto')->storeAs(
                'blog/imagenes', "cursania-imagen-" . date('dmYhis') . "." . $request->file('foto')->getClientOriginalExtension()
            );
            //$data["link"] = url('imagenes/' . $data["initial_link"]);
            $data["link"] = '/imagenes/' . $data["initial_link"];
            return response()->json(array('data' => $data));
        }

        return response()->json("error", 400);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $request Request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'    => 'required|max:200',
            'resumen'   => 'required',
            'contenido' => 'required',
            'categoria' => 'required',
            'etiquetas' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $object = new Post();
        if ($request->has("id")) {
            $object = Post::find($request->input("id"));
        }

        $object->post_nombre    = $request->input("nombre");
        $object->post_resumen   = $request->input("resumen");
        $object->post_cuerpo    = $request->input("contenido");
        $object->post_etiquetas = $request->input("etiquetas");
        $object->post_cat_id    = $request->input("categoria");
        $object->prof_id        = $request->input("profesor");
        $object->post_url       = str_slug($request->input("nombre"));

        if ($request->hasFile('foto')) {
            $object->post_imagen = $request->file('foto')->storeAs(
                'blog/portadas', "cover-post-" . $object->post_url . "." . $request->file('foto')->getClientOriginalExtension()
            );
        }

        $object->save();

        if ($request->ajax()) {
            return 1;
        }

        return redirect()->back()->with([
            "estado" => "ok",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $object                   = Post::withTrashed()->where("post_id", $id)->first();
        $this->data["object"]     = $object;
        $this->data["categorias"] = PostCategoria::all();
        $this->data["profesores"] = Profesor::all();
        return view("admin." . str_slug($this->data["entity_p"]) . ".create")->with($this->data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  $request Request
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $type = "software";
        if ($request->has("type")) {
            $type = $request->input("type");
        }
        $object = Profesor::withTrashed()->where("prof_id", $id)->first();
        if ($object) {

            if ($type == "software") {
                $object->delete();
            } else if ($type == "delete") {
                $object->forceDelete();
            } else if ($type == "restore") {
                $object->restore();
            }
            return redirect()->route(str_slug($this->data["entity_p"]) . ".index")->with([
                "estado"  => "ok",
                "mensaje" => $this->data["entity_pro"] . " " . $this->data["entity_s"] . " se ha " . ($type == "restore" ? ' restaurado ' : 'Eliminado') . " correctamente",
            ]);
        }

        return redirect()->route(str_slug($this->data["entity_p"]) . ".index")->with([
            "estado"  => "error",
            "mensaje" => "No se encuentra " . str_slug($this->data["entity_pro"]) . " " . $this->data["entity_s"] . " con el id: " . $id,
        ]);
    }

}
