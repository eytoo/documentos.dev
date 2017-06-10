<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use App\Userl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Usuarios";
        $this->data["entity_s"]   = "Usuario";
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
        $this->data["dataList"] = Userl::all();
        if ($request->has("lista") && $request->input("lista") == "eliminados") {
            $this->data["dataList"] = Userl::onlyTrashed()->get();
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
        $this->data["countries"] = Country::all();
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
            'email'     => $request->has("id") ? 'required' : 'required|unique:users',
            'modo'      => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $object = new Userl();
        if ($request->has("id")) {
            $object = Userl::find($request->input("id"));
        }

        $object->user_nombre     = $request->input("nombre");
        $object->user_apellidos  = $request->input("apellidos");
        $object->email           = $request->input("email");
        $object->password        = Hash::make($request->input("password"));
        $object->user_reg_modo   = $request->input("modo");
        $object->user_confirmado = $request->input("estado");
        $object->user_country_id = $request->input("pais");
        $object->user_ip         = str_slug($request->input("nombre")) . "-" . str_slug($request->input("apellidos"));

        if ($request->hasFile('foto')) {
            $object->user_foto = $request->file('foto')->storeAs(
                'usuario/foto', "foto-usuario-" . $object->user_ip . "." . $request->file('foto')->getClientOriginalExtension()
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
        $object                  = Userl::withTrashed()->where("id", $id)->first();
        $this->data["object"]    = $object;
        $this->data["countries"] = Country::all();
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

        $object = Userl::withTrashed()->where("id", $id)->first();
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
