<?php

namespace App\Http\Controllers;

use App\Country;
use App\Driver;
use App\User;
use App\Userl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ConductorController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Conductores";
        $this->data["entity_s"]   = "Conductor";
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
        $this->data["dataList"] = Userl::where("roles_id", 2)->with("driver")->get();
        // return $this->data;

        if ($request->has("lista") && $request->input("lista") == "eliminados") {
            $this->data["dataList"] = Userl::onlyTrashed()->where("roles_id", 2)->get();
        }

        //return $this->data;

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

        //return $request->all();

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:200',
            'email'  => $request->has("id") ? 'required' : 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $object    = new Userl();
        $conductor = new Driver();
        if ($request->has("id")) {
            $object    = Userl::find($request->input("id"));
            $conductor = Driver::where("users_id", $object->id)->first();
        }

        $object->name  = $request->input("nombre");
        $object->email = $request->input("email");
        if ($request->has("password")) {
            $object->password = Hash::make($request->input("password"));
        }
        $object->user_reg_modo = $request->input("modo");
        $object->activo        = $request->input("estado");
        $object->roles_id      = 2;
        $object->telefono      = $request->input('telefono');

        if ($request->hasFile('foto')) {
            $object->user_foto = $request->file('foto')->storeAs(
                'usuario/foto', "foto-usuario-" . str_slug($user->email) . "." . $request->file('foto')->getClientOriginalExtension()
            );
        }
        $object->save();

        $conductor->nombres     = $request->input("nombre");
        $conductor->apellidos   = $request->input("apellidos");
        $conductor->fechanac    = date("Y-m-d", strtotime($request->input("fechanac")));
        $conductor->genero      = $request->input("genero");
        $conductor->direccion   = $request->input("direccion");
        $conductor->dni         = $request->input("dni");
        $conductor->licencia    = $request->input("licencia");
        $conductor->fechacadlic = date("Y-m-d", strtotime($request->input("fechacadlic")));
        $conductor->save();

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
     * Muestra el vehiculo del conductor.
     *
     * @param  int  $id
     * @return Response
     */
    public function vehiculo($id)
    {
        $this->data["conductor"] = Userl::where("roles_id", 2)->where("id", $id)->with("driver", "driver.carro", "driver.carro.modelo", "driver.carro.marca")->first();
        $this->data["vehiculo"]  = $this->data["conductor"]->driver->carro;
        return view("admin.vehiculos.create")->with($this->data);
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
