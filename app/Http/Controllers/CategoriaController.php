<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Rubro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{

    private $data = array();

    /**
     * RubroController constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Categorías";
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
        $this->data["dataList"] = Categoria::with("rubro")->get();
        return view("admin." . str_slug($this->data["entity_p"]) . ".index")->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->data["rubros"] = Rubro::all();
        return view("admin." . str_slug($this->data["entity_p"]) . ".create")->with($this->data);
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

        $object = new Categoria();
        if ($request->has("id")) {
            $object = Categoria::find($request->input("id"));
        }

        $object->cat_nombre = $request->input("nombre");
        $object->cat_url    = str_slug($request->input("nombre"));
        $object->rubro_id   = $request->input("rubro");

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
        $object               = Categoria::find($id);
        $this->data["object"] = $object;
        $this->data["rubros"] = Rubro::all();
        return view("admin." . str_slug($this->data["entity_p"]) . ".create")->with($this->data);
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
