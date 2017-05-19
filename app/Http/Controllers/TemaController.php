<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TemaController extends Controller
{
    /**
     * TemaController constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Temas";
        $this->data["entity_s"]   = "Tema";
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
        if ($request->has("curso")) {
            \session(["cur_id" => $request->input("curso")]);
        }

        $this->data["dataList"] = Tema::where("cur_id", \session('cur_id'))->get();
        $this->data["curso"]    = Curso::find(\session('cur_id'));
        if ($request->has("lista") && $request->input("lista") == "eliminados") {
            $this->data["dataList"] = Tema::where("cur_id", \session('cur_id'))->onlyTrashed()->get();
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
        return view("admin." . str_slug($this->data["entity_p"]) . ".create")->with($this->data);
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
            'nombre' => 'required|max:200',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $object = new Tema();
        if ($request->has("id")) {
            $object = Tema::where("cur_id", \session('cur_id'))->where("tema_id", $request->input("id"))->first();
        }

        $object->tema_nombre      = $request->input("nombre");
        $object->tema_descripcion = $request->has("descripcion") ? $request->input("descripcion") : ' ';
        $object->tema_url         = str_slug($request->input("nombre"));
        $object->cur_id           = \session("cur_id");

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
        $object               = Tema::withTrashed()->where("tema_id", $id)->where("cur_id", session("cur_id"))->first();
        $this->data["object"] = $object;
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
     * @param  $request Request
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $type = "software";
        if ($request->has("type")) {
            $type = $request->input("type");
        }
        $object = Tema::withTrashed()->where("tema_id", $id)->where("cur_id", session("cur_id"))->first();
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
