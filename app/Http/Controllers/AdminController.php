<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    private $data = array();
    /**
     * Profesor.Controller constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Administradores";
        $this->data["entity_s"]   = "Administrador";
        $this->data["entity_pro"] = "El";
        $this->middleware("permission:user_all");
    }
    /**
     * Lista usuarios en la página de administradores
     *
     * @return view()
     */
    public function index(Request $request)
    {
        $this->data["dataList"] = Admin::all();
        return view("admin." . str_slug($this->data["entity_p"]) . ".index")->with($this->data);
    }

    /**
     * Permite mostrar la vista crear nuevos usuarios
     *
     * @return view()
     */
    public function create()
    {
        return view("admin." . str_slug($this->data["entity_p"]) . ".create")->with($this->data);
    }

    /**
     * Permite mostrar la vista para editar usuarios
     *
     * @return view()
     */
    public function edit($id)
    {
        $object               = Admin::find($id);
        $this->data["object"] = $object;
        return view("admin." . str_slug($this->data["entity_p"]) . ".create")->with($this->data);
    }

    /**
     * Permite guardar al usuario nuevo
     *
     * @param  Request         $request
     * @return redirect()
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => $request->has("id") ? 'required' : 'required|max:50',
            'email'    => $request->has("id") ? 'required|email' : 'required|unique:admins|email',
            'password' => $request->has("id") ? '' : 'required',
            'rol_id'   => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $user = new Admin();
        if ($request->has("id")) {
            $user = Admin::find($request->input("id"));
        }
        $user->admin_nombre    = $request->input("name");
        $user->admin_apellidos = $request->input("username");
        $user->email           = $request->input("email");
        $user->admin_foto      = "default";
        //$user->url      = str_slug($request->input("name"), $separator = "-");
        if ($request->has("password")) {
            $user->password = Hash::make($request->input("password"));
        }
        /*if ($request->has("note")) {
        $user->note = $request->input("note");
        } else {
        $user->note = " ";
        }*/
        $user->save();

        $user->roles()->detach();
        $user->roles()->attach($request->input("rol_id"));

        if ($request->ajax()) {
            return 1;
        }

        return redirect()->back()->with([
            "estado" => "ok",
        ]);
    }

    /**
     * Permite eliminar un usuario
     *
     * @param     integer     $id     Id del usuario
     * @return     redirect()
     */
    public function destroy($id)
    {
        $user = Admin::find($id);
        if ($user) {

            $user->delete();

            return redirect()->route("users.index")->with([
                "estado" => "ok",
                "error"  => "Se ha eliminado el usuario correctamente",
            ]);
        }
        return redirect()->route("users.index")->with([
            "estado" => "mal",
            "error"  => "No se encuentra el usuario con el id: " . $id,
        ]);
    }
}
