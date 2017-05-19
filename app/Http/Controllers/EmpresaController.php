<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Producto;
use App\Setting;
use Illuminate\Http\Request;

class EmpresaController extends Controller
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
    	$data["c"] = Setting::find(1);
        return view("admin.empresa.index")->with($data);
    }

    /**
     * Permite mostrar la vista crear nuevos proyectos
     *
     * @return view()
     */
    public function create()
    {
        $data["empresa"] = Setting::find(1);
        return view("admin.empresa.create")->with($data);
    }

    /**
     * Permite guardar al usuario nuevo
     *
     * @param  Request         $request
     * @return redirect()
     */
    public function store(Request $request)
    {
        $empresa = Setting::find(1);

        if($request->has("precio_compra")){
        	$empresa->precio_compra = $request->input("precio_compra");
        }
        if($request->has("precio_venta")){
        	$empresa->precio_venta = $request->input("precio_venta");
        }
        
        if($request->has("bono_productor")){
            $empresa->bono_productor = $request->input("bono_productor");
        }

        if($request->has("cantidad")){
            $producto = Producto::find(1);
            $producto->cantidad = $request->input("cantidad");
            $producto->save();
        }

 
        if ($request->hasFile('logo_login')) {
            $destinationPath = 'uploads'; // upload path
            $extension = $request->file('logo_login')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $request->file('logo_login')->move($destinationPath, $fileName); // uploading file to given 
            $empresa->logo_login = "uploads/".$fileName;
        }

        if ($request->hasFile('logo_sistema')) {
            $destinationPath = 'uploads'; // upload path
            $extension = $request->file('logo_sistema')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $request->file('logo_sistema')->move($destinationPath, $fileName); // uploading file to given 
            $empresa->logo_sistema = "uploads/".$fileName;
        }

        if($request->has("encendido")){
        	$empresa->encendido = 1;
        }else{
        	$empresa->encendido = 0;
        }

        $empresa->save();

        if ($request->ajax()) {
            return 1;
        }

        return redirect()->back()->with([
            "estado" => "ok",
        ]);
    }

    /**
     * IMÁGENES DEL SISTEMA
     */
    public function onof()
    {
        $data["empresa"] = Setting::find(1);
        return view("admin.empresa.onof")->with($data);
    }

    public function cantidad()
    {
        $data["empresa"] = Setting::find(1);
        return view("admin.empresa.cantidad")->with($data);
    }

    /**
     * Configuración de bonificación
     *
     * @return view()
     */
    public function bono()
    {   
        $data["c"] = Setting::find(1);
        return view("admin.empresa.bono")->with($data);
    }

    /**
     * Configuración de Imágenes
     *
     * @return view()
     */
    public function imagenes()
    {   
        $data["c"] = Setting::find(1);
        return view("admin.empresa.imagenes")->with($data);
    }
}
