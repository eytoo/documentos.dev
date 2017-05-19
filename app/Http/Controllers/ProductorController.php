<?php

namespace App\Http\Controllers;

use App\Productor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductorController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:project_all");
    }

    /**
     * Lista usuarios en la página de administradores
     *
     * @return view()
     */
    public function index()
    {
        $data["productores"] = Productor::all();
        return view("admin.productores.index")->with($data);
    }

    /**
     * Permite mostrar la vista crear nuevos proyectos
     *
     * @return view()
     */
    public function create()
    {
        return view("admin.productores.create");
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
            'nombre' => 'required|max:50',
            //'detail' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $Productor = new Productor();
        if ($request->has("id")) {
            $Productor = Productor::find($request->input("id"));
        }
        
        $Productor->codigo = "001";

        $Productor->nombre = $request->input("nombre");
        $Productor->fecha_nacimiento = date("Y-m-d",strtotime($request->input("fecha_nac")));
        $Productor->telefono = $request->input("telefono");
        $Productor->direccion = $request->input("direccion");
        
        //$Productor->url = str_slug($request->input("name"));
        $Productor->save();

        if ($request->ajax()) {
            return 1;
        }

        return redirect()->back()->with([
            "estado" => "ok",
        ]);
    }
    /**
     * Permite mostrar la vista para editar usuarios
     *
     * @return view()
     */
    public function edit($id)
    {
        $Productor         = Productor::find($id);
        $data["productor"] = $Productor;
        return view("admin.productores.create")->with($data);
    }

    /**
     * Permite eliminar un usuario
     *
     * @param     integer     $id     Id del usuario
     * @return     redirect()
     */
    public function destroy($id)
    {
        $Productor = Productor::find($id);
        if ($Productor) {

            $Productor->delete();

            return redirect()->route("productores.index")->with([
                "estado" => "ok",
                "error"  => "El productor se ha eliminado correctamente",
            ]);
        }
        return redirect()->route("productores.index")->with([
            "estado" => "mal",
            "error"  => "No se encuentra el productor con el id: " . $id,
        ]);
    }
}
