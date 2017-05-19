<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:config_all");
    }
    /**
     * Lista roles en la página de administradores
     *
     * @return view()
     */
    public function index()
    {
        $data["roles"]    = Role::all();
        $data["pers"]     = Permission::all();
        $data["per_role"] = explode(",", DB::table('permission_role')
                ->select(DB::raw('CONCAT(role_id,"-",permission_id) AS detail'))
                ->get()->implode("detail", ","));
        return view("admin.roles.index")->with($data);
    }

    /**
     * Permite mostrar la vista crear nuevos usuarios
     *
     * @return view()
     */
    public function create()
    {
        return view("admin.roles.create");
    }

    /**
     * Permite mostrar la vista para editar rol
     *
     * @return view()
     */
    public function edit($id)
    {
        $role         = Role::find($id);
        $data["role"] = $role;
        return view("admin.roles.create")->with($data);
    }

    /**
     * Crea un nuevo Rol
     *
     * @param  Request         $request
     * @return redirect()
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'   => 'required|max:50',
            'detalles' => 'required|max:200',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $owner = new Role();
        if ($request->has("id")) {
            $owner = Role::find($request->input("id"));
        }
        $owner->name         = strtolower($request->input("nombre"));
        $owner->display_name = $request->input("nombre"); // optional
        $owner->description  = $request->input("detalles"); // optional
        $owner->save();

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
        $role = Role::findOrFail($id);
        if ($role) {

            //$role->delete();
            $role->delete();

            return redirect()->route("roles.index")->with([
                "estado" => "ok",
                "error"  => "Se ha eliminador el Rol correctamente",
            ]);
        }
        return redirect()->route("roles.index")->with([
            "estado" => "mal",
            "error"  => "No se encuentra el Rol con el id: " . $id,
        ]);
    }
}
