<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Planta;
use App\Productor;
use App\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    //

    public function productores(){
    	$data["productores"] = Productor::orderBy("created_at","desc")->get();
        return view("admin.reportes.productores")->with($data);
    }

    public function ventas(Request $request){
    	$dateStart = date("Y-m-d");
        $dateEnd   = date("Y-m-d");

        if ($request->has("date-start")) {
            $dateStart = date("Y-m-d", strtotime($request->input("date-start")));
        }
        if ($request->has("date-end")) {
            $dateEnd = date("Y-m-d", strtotime($request->input("date-end")));
        }
        
        $data["ventas"] = Venta::where("fecha", ">=", $dateStart)
                ->where("fecha", "<=", $dateEnd)
                ->orderBy("fecha","desc")
                ->get();
                
        return view("admin.reportes.ventas")->with($data);
    }

    public function compras(Request $request){
        $dateStart = date("Y-m-d");
        $dateEnd   = date("Y-m-d");

        if ($request->has("date-start")) {
            $dateStart = date("Y-m-d", strtotime($request->input("date-start")));
        }
        if ($request->has("date-end")) {
            $dateEnd = date("Y-m-d", strtotime($request->input("date-end")));
        }
        
        $data["compras"] = Compra::where("fecha", ">=", $dateStart)
                ->where("fecha", "<=", $dateEnd)
                ->orderBy("fecha","desc")
                ->get();
                
        return view("admin.reportes.compras")->with($data);
    }

    public function bonoProductor(Request $request){
        $dt = Carbon::now();
        $dateStart = date("Y-m-d",strtotime($dt->startOfYear()));
        $dateEnd   = date("Y-m-d",strtotime($dt->endOfYear()));
        
        if ($request->has("date-start")) {
            $dt = Carbon::parse($request->input("date-start"));
            $dateStart = date("Y-m-d",strtotime($dt->startOfYear()));
            $dateEnd   = date("Y-m-d",strtotime($dt->endOfYear()));
        }
        

        $data["datos"] = array();
        $data["productores"] = Productor::all();

        foreach ($data["productores"] as $pro) {
            $data["datos"][] = array(
                    "anio"=>date("Y",strtotime($dateStart)),
                    "productor"=>$pro->nombre,
                    "pro_id"=>$pro->id,
                    "cantidad_total"=>$this->getCompras($dateStart,$dateEnd,$pro->id),
                    "bono"=>$this->getCompras($dateStart,$dateEnd,$pro->id) / 1000 * conf()->bono_productor,
                );
        }

        return view("admin.reportes.bonoProds")->with($data);
    }

    public function bonoAcopio(Request $request){
        $dt = Carbon::now();
        $dateStart = date("Y-m-d",strtotime($dt->startOfYear()));
        $dateEnd   = date("Y-m-d",strtotime($dt->endOfYear()));
        
        if ($request->has("date-start")) {
            $dt = Carbon::parse($request->input("date-start"));
            $dateStart = date("Y-m-d",strtotime($dt->startOfYear()));
            $dateEnd   = date("Y-m-d",strtotime($dt->endOfYear()));
        }
        

        $data["datos"] = array();
        $data["clientes"] = Planta::where("otros",1)->get();

        foreach ($data["clientes"] as $pro) {
            $data["datos"][] = array(
                    "anio"=>date("Y",strtotime($dateStart)),
                    "cliente"=>$pro->nombre,
                    "cli_id"=>$pro->id,
                    "montoport"=>$pro->bono,
                    "cantidad_total"=>$this->getVentas($dateStart,$dateEnd,$pro->id),
                    "bono"=>$this->getVentas($dateStart,$dateEnd,$pro->id) / 1000 * $pro->bono,
                );
        }
        //return $data;
        return view("admin.reportes.bonoAcopio")->with($data);
    }

    public function getCompras($dateStart,$dateEnd,$pro_id){
        $compras = Compra::where("fecha", ">=", $dateStart)
                ->where("fecha", "<=", $dateEnd)
                ->where("productor_id",$pro_id)
                ->orderBy("fecha","desc")
                ->get();
        $totalCompra = 0;
        foreach ($compras as $c) {
            $totalCompra += $c->detcompra->cantidad;
        }
        return $totalCompra;
    }

    public function getVentas($dateStart,$dateEnd,$pro_id){
        $compras = Venta::where("fecha", ">=", $dateStart)
                ->where("fecha", "<=", $dateEnd)
                ->where("planta_id",$pro_id)
                ->orderBy("fecha","desc")
                ->get();
        $totalCompra = 0;
        foreach ($compras as $c) {
            $totalCompra += $c->peso;
        }
        return $totalCompra;
    }

}
