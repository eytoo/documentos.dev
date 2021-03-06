<?php

namespace App\Http\Controllers;

use App\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfesorController extends Controller
{

    /**
     * Profesor.Controller constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Profesores";
        $this->data["entity_s"]   = "Profesor";
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
        $this->data["dataList"] = Profesor::all();
        if ($request->has("lista") && $request->input("lista") == "eliminados") {
            $this->data["dataList"] = Profesor::onlyTrashed()->get();
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
            'nombre'    => 'required|max:200',
            'apellidos' => 'required',
            'email'     => 'required',
            'historia'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $object = new Profesor();
        if ($request->has("id")) {
            $object = Profesor::find($request->input("id"));
        }

        $object->prof_nombre    = $request->input("nombre");
        $object->prof_apellidos = $request->input("apellidos");
        $object->prof_correo    = $request->input("email");
        $object->prof_telefono  = $request->input("telefono");
        $object->prof_web       = $request->input("web");
        $object->prof_ocupacion = $request->input("ocupacion");
        $object->prof_historia  = $request->input("historia");
        $object->prof_url       = str_slug($request->input("nombre")) . "-" . str_slug($request->input("apellidos"));

        if ($request->hasFile('foto')) {
            $object->prof_foto = $request->file('foto')->storeAs(
                'profesor/foto', "foto-profesor-" . $object->prof_url . "." . $request->file('foto')->getClientOriginalExtension()
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
        $object               = Profesor::withTrashed()->where("prof_id", $id)->first();
        $this->data["object"] = $object;
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
