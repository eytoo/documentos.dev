<?php

namespace App\Http\Controllers;

use App\Planta;
use App\Producto;
use App\Venta;
use Illuminate\Http\Request;
use Auth;
use Validator;
class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:vent_all");
    }

    /**
     * Lista usuarios en la página de administradores
     *
     * @return view()
     */
    public function index()
    {
        $data["ventas"] = Venta::all();
        //return $data;
        return view("admin.ventas.index")->with($data);
    }

    /**
     * Permite mostrar la vista para editar usuarios
     *
     * @return view()
     */
    public function edit($id)
    {
        $venta         = Venta::find($id);
        $data["codigo"] = $venta->codigo;
        $data["clientes"] = Planta::all();
        $data["venta"] = $venta;
        return view("admin.ventas.create")->with($data);
    }

    /**
     * Permite mostrar la vista crear nuevos proyectos
     *
     * @return view()
     */
    public function create()
    {
        $data["codigo"] = $this->GenerateCode();
        $data["clientes"] = Planta::all();
        return view("admin.ventas.create")->with($data);
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
            'cliente' => 'required|max:50',
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

        $venta = new Venta();

        if ($request->has("id")) {
            $venta = Venta::find($request->input("id"));
        }else{
            $venta->codigo = $this->GenerateCode();
        }

        $venta->fecha = $request->input("fecha");
        $venta->planta_id = $request->input("cliente");
        $venta->producto_id = 1;
        $venta->user_id = Auth::user()->id;
        $venta->bonificacion = 0;
        $venta->devolucion = 0;
        $venta->precio = 0;
        
        $venta->total_venta = $request->input("ptotal");

        $producto =  Producto::find(1);
        
        if ($request->has("id")) {
            $producto->cantidad = $producto->cantidad + $venta->peso;
            $producto->cantidad = $producto->cantidad - $request->input("pesoTotal");
        }else{
            $producto->cantidad -= $request->input("pesoTotal");
        }

        $producto->save();

        $venta->peso = $request->input("pesoTotal");

        $venta->save();

        if($request->ajax()) {
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
    private function getDetalleventa($request)
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
        $cantidad = Venta::count();
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

        return "V". date('His') . $numerito . $cantidad;
    }

    /**
     * Permite eliminar un usuario
     *
     * @param     integer     $id     Id del usuario
     * @return     redirect()
     */
    public function destroy($id)
    {
        $venta = Venta::find($id);
        if ($venta) {

            $venta->delete();

            return redirect()->route("ventas.index")->with([
                "estado" => "ok",
                "error"  => "La venta se ha eliminado correctamente",
            ]);
        }
        return redirect()->route("ventas.index")->with([
            "estado" => "mal",
            "error"  => "No se encuentra la venta con el id: " . $id,
        ]);
    }
}
