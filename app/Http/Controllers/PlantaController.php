<?php

namespace App\Http\Controllers;

use App\Planta;
use Validator;
use Illuminate\Http\Request;

class PlantaController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:timing_all");
    }

    /**
     * Lista usuarios en la página de administradores
     *
     * @return view()
     */
    public function index()
    {
        $data["plantas"] = Planta::all();
        return view("admin.plantas.index")->with($data);
    }

    /**
     * Permite mostrar la vista crear nuevos proyectos
     *
     * @return view()
     */
    public function create()
    {
        return view("admin.plantas.create");
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
            'direccion' => 'required',
            //'detail' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $planta = new Planta();
        if ($request->has("id")) {
            $planta = Planta::find($request->input("id"));
        }

        $planta->nombre = $request->input("nombre");
        $planta->direccion = $request->input("direccion");
        if($request->has("hasbono") && $request->has("bono")){
            $planta->otros = 1;
            $planta->bono = $request->input("bono");
        }else{
            $planta->otros = 0;
            $planta->bono = NULL;
        }

        $planta->save();

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
        $planta         = Planta::find($id);
        $data["planta"] = $planta;
        return view("admin.plantas.create")->with($data);
    }

    /**
     * Permite eliminar un usuario
     *
     * @param     integer     $id     Id del usuario
     * @return     redirect()
     */
    public function destroy($id)
    {
        $planta = Planta::find($id);
        if ($planta) {

            $planta->delete();

            return redirect()->route("plantas.index")->with([
                "estado" => "ok",
                "error"  => "El planta se ha eliminado correctamente",
            ]);
        }
        return redirect()->route("plantas.index")->with([
            "estado" => "mal",
            "error"  => "No se encuentra el planta con el id: " . $id,
        ]);
    }
}
