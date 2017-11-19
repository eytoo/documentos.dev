<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\User;
use Illuminate\Http\Request;

class CarreraController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Carreras";
        $this->data["entity_s"]   = "Carrera";
        $this->data["entity_pro"] = " ";
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->data["dataList"] = Carrera::all();
        /*if ($request->has("lista") && $request->input("lista") == "eliminados") {
        $this->data["dataList"] = Userl::onlyTrashed()->where("roles_id", 1)->get();
        }*/
        return view("admin." . str_slug($this->data["entity_p"]) . ".index")->with($this->data);
    }
}
