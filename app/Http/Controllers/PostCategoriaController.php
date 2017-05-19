<?php

namespace App\Http\Controllers;

use App\PostCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostCategoriaController extends Controller
{

    private $data = array();

    /**
     * RubroController constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Categorías";
        $this->data["route"]      = "postcategorias";
        $this->data["entity_s"]   = "Categoría";
        $this->data["entity_pro"] = "La";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->data["dataList"] = PostCategoria::all();
        return view("admin." . str_slug($this->data["route"]) . ".index")->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->data["categorias"] = PostCategoria::all();
        return view("admin." . str_slug($this->data["route"]) . ".create")->with($this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:50',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $object = new PostCategoria();
        if ($request->has("id")) {
            $object = PostCategoria::find($request->input("id"));
        }

        $object->pos_cat_nombre = $request->input("nombre");
        $object->post_cat_url   = str_slug($request->input("nombre"));
        if ($request->has("parent")) {
            $object->post_cat_parent_id = $request->input("parent");
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
        $object                   = PostCategoria::find($id);
        $this->data["object"]     = $object;
        $this->data["categorias"] = PostCategoria::all();
        return view("admin." . str_slug($this->data["route"]) . ".create")->with($this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $object = Rubro::find($id);
        if ($object) {

            $object->delete();

            return redirect()->route(str_slug($this->data["entity_p"]) . ".index")->with([
                "estado" => "ok",
                "error"  => str_slug($this->data["entity_pro"]) . " " . str_slug($this->data["entity_s"]) . " se ha eliminado correctamente",
            ]);
        }

        return redirect()->route(str_slug($this->data["entity_p"]) . ".index")->with([
            "estado" => "mal",
            "error"  => "No se encuentra " . str_slug($this->data["entity_pro"]) . " " . str_slug($this->data["entity_s"]) . " con el id: " . $id,
        ]);
    }

}
