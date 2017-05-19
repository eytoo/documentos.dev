<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Detcompra;
use App\Producto;
use App\Productor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:comp_all");
    }

    /**
     * Lista usuarios en la página de administradores
     *
     * @return view()
     */
    public function index(Request $request)
    {   
        $data["compras"]=collect();
        if($request->has("filter") && $request->input("filter") == "open"){
            $data["compras"] = Compra::where("estado",1)->orderBy("created_at","desc")->get();
        }else{
            $data["compras"] = Compra::orderBy("created_at","desc")->get();
        }
        return view("admin.compras.index")->with($data);
    }

    /**
     * Permite mostrar la vista para editar usuarios
     *
     * @return view()
     */
    public function edit($id)
    {
        $compra         = Compra::find($id);
        $data["codigo"] = $compra->codigo;
        $data["productores"] = Productor::all();
        $data["compra"] = $compra;
        return view("admin.compras.create")->with($data);
    }

    /**
     * Permite mostrar la vista crear nuevos proyectos
     *
     * @return view()
     */
    public function create()
    {
        $data["codigo"] = $this->GenerateCode();
        $data["productores"] = Productor::all();
        return view("admin.compras.create")->with($data);
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
            'productor' => 'required|max:50',
            'fecha' => 'required',
            //'detail' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }
        //return $request->all();

        $compra = new Compra();

        if ($request->has("id")) {
            $compra = Compra::find($request->input("id"));
        }else{
            $compra->codigo = $this->GenerateCode();
        }

        $compra->fecha = $request->input("fecha");
        $compra->productor_id = $request->input("productor");
        $compra->producto_id = 1;
        $compra->user_id = Auth::user()->id;
        $compra->estado = $request->input("estado");
        $compra->bonificacion = 0;

        if($compra->save()){
            $detCompra = new Detcompra();
            $producto =  Producto::find(1);
            if ($request->has("id")) {
                $detCompra = Detcompra::where("compra_id","=",$compra->id)->first();
                $producto->cantidad -= $detCompra->cantidad;
                $producto->cantidad += $request->input("pesoTotal");
            }else{
                $detCompra->compra_id = $compra->id;
                $producto->cantidad += $request->input("pesoTotal");
            }
            $detCompra->cantidad = $request->input("pesoTotal");
            $detCompra->total_compra = $request->input("ptotal");
            $detCompra->precio = 0;
            $detCompra->detalle = json_encode($this->getDetallecompra($request));

            $detCompra->save();
            $producto->save();
        }

        if ($request->ajax()) {
            return 1;
        }

        return redirect()->back()->with([
            "estado" => "ok",
        ]);
    }

    /**
     * Obtiene todas la cotizaciones hechas en el formulario
     *
     * @param   Request     $request
     * @return  Array
     */
    private function getDetallecompra($request)
    {
        $cantidad    = $request->input("cantidad");
        $importe      = $request->input("precio");
        $detalle = array();
        for ($i = 0; $i < count($cantidad); $i++) {
            $detalle[] = array(
                "cantidad" => $cantidad[$i],
                "precio"  => $importe[$i],
            );
        }
        return $detalle;
    }

    private function GenerateCode()
    {
        $cantidad = Compra::count();
        $cantidad += 1;

        switch (strlen($cantidad)) {
            case 1:
                $numerito = '000';
                break;
            case 2:
                $numerito = '00';
                break;
            case 3:
                $numerito = '0';
                break;
            default:
                $numerito = '';
                break;
        }

        return "C". date('His') . $numerito . $cantidad;
    }

    /**
     * Permite eliminar un usuario
     *
     * @param     integer     $id     Id del usuario
     * @return     redirect()
     */
    public function destroy($id)
    {
        $compra = Compra::find($id);
        if ($compra) {

            $compra->delete();

            return redirect()->route("compras.index")->with([
                "estado" => "ok",
                "error"  => "La compra se ha eliminado correctamente",
            ]);
        }
        return redirect()->route("compras.index")->with([
            "estado" => "mal",
            "error"  => "No se encuentra la compra con el id: " . $id,
        ]);
    }
}
