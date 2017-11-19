<?php

namespace App\Http\Controllers;
use App\User;
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
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        for ($i=0; $i < $meses_cantidad; $i++) {
            $fecha = 1 ."/". ($i+1) ."/". $anio;
            $dt = Carbon::create($anio, ($i+1), 1, 0, 0, 0);
            if($this->getUsuarios($dt) > 0 || $this->getConductores($dt) > 0){
                $fechas[] = array(
                    "month"=>$meses[$i],
                    "usuarios"=>$this->getUsuarios($dt),
                    "conductores"=>$this->getConductores($dt),
                );
            }
        }

        $data["data"] = $fechas;
        $data["usuariost"] = User::where("roles_id",1)->count();
        $data["conductorest"] = User::where("roles_id",2)->count();

        $data["usuariosa"] = User::where("roles_id",1)->where("activo",1)->count();
        $data["conductoresa"] = User::where("roles_id",2)->where("activo",1)->count();
        $data["conductoresi"] = User::where("roles_id",2)->where("activo",0)->count();

        $fechaactual = Carbon::now();
        $data["mesactual"] = $meses[date("m") - 1];
        $data["usuariosmes"] = $this->getUsuariosMes($fechaactual);

        //return $data["data"];
        return view('home')->with($data);
    }

    private function getUsuarios($date_param){
        $date = $date_param;
        $startDate = date("Y-m-d",strtotime($date->startOfMonth()));
        $endDate = date("Y-m-d",strtotime($date->endOfMonth()));
        $ventas = User::where("created_at",">=",$startDate)
        ->where("created_at","<=",$endDate)
        ->where("roles_id",1)
        ->count();

        return $ventas;
    }

    private function getConductores($date_param){
        $date = $date_param;
        $startDate = date("Y-m-d",strtotime($date->startOfMonth()));
        $endDate = date("Y-m-d",strtotime($date->endOfMonth()));
        $ventas = User::where("created_at",">=",$startDate)
        ->where("created_at","<=",$endDate)
        ->where("roles_id",2)
        ->count();

        return $ventas;
    }

    private function getUsuariosMes($date_param){
        $date = $date_param;
        $startDate = date("Y-m-d",strtotime($date->startOfMonth()));
        $endDate = date("Y-m-d",strtotime($date->endOfMonth()));
        $ventas = User::where("created_at",">=",$startDate)
        ->where("created_at","<=",$endDate)
        ->count();
        return $ventas;
    }
}
