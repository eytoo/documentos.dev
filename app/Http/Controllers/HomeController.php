<?php

namespace App\Http\Controllers;
use App\VentaCab;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anio = date("Y");
        $meses_cantidad = date("n");
        $fechas = array();
        $meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");

        for ($i=0; $i < $meses_cantidad; $i++) {
            $fecha = 1 ."/". ($i+1) ."/". $anio; 
            $dt = Carbon::create($anio, ($i+1), 1, 0, 0, 0);
            $fechas[] = array(
                "month"=>$meses[$i],
                "sales"=>$this->getVentas($dt),
            );//;    
        }

        $data["data"] = $fechas;

        //return $data["data"];
        return view('home')->with($data);
    }

    private function getVentas($date_param){
        $date = $date_param;
        $startDate = date("Y-m-d",strtotime($date->startOfMonth()));
        $endDate = date("Y-m-d",strtotime($date->endOfMonth()));
        $ventas = VentaCab::where("vc_feho",">=",$startDate)
        ->where("vc_feho","<=",$endDate)
        ->sum('vc_total');

        return $ventas;
    }
}
