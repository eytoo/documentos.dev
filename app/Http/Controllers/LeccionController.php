<?php

namespace App\Http\Controllers;

use App\Leccion;
use App\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Config;

class LeccionController extends Controller {

    /**
     * LeccionController constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Lecciones";
        $this->data["entity_s"]   = "Lección";
        $this->data["entity_pro"] = "La";
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(!Session::has("vimeo_access_token")){
          Session::put("state",str_random(60));
          Session::put("redir",url()->full());
          $lib = new \Vimeo\Vimeo(Config::get("services.vimeo.client_id"),Config::get("services.vimeo.client_secret"));
          return 'Inicia sesión en vimeo <a href="'
  			. $lib->buildAuthorizationEndpoint(Config::get("services.vimeo.redirect"), 'private', Session::get("state"))
  			. '">here</a><br />';
        }

        Session::forget("redir");

        if ($request->has("tema")) {
            session(["tema_id" => $request->input("tema")]);
        }

        $this->data["dataList"] = Leccion::where("tema_id", \session('tema_id'))->get();
        $this->data["tema"]    = Tema::find(\session('tema_id'));
        if ($request->has("lista") && $request->input("lista") == "eliminados") {
            $this->data["dataList"] = Leccion::where("tema_id", \session('tema_id'))->onlyTrashed()->get();
        }
        return view("admin." . str_slug($this->data["entity_p"]) . ".index")->with($this->data);
    }

    public function validar()
    {
        if (Session::get('state') != $_GET['state']) {
          return 'Error de login';
        }
        $lib = new \Vimeo\Vimeo(Config::get("services.vimeo.client_id"),Config::get("services.vimeo.client_secret"));
        $tokens = $lib->accessToken($_GET['code'], Config::get("services.vimeo.redirect"));
        if ($tokens['status'] == 200) {
          Session::put('vimeo_access_token',$tokens['body']['access_token']);
          Session::forget("state");

          return redirect(Session::get("redir"));
        } else {
          var_dump($tokens);
        }
    }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $lib = new \Vimeo\Vimeo(Config::get("services.vimeo.client_id"),Config::get("services.vimeo.client_secret"), Session::get('vimeo_access_token'));
      $videos = $lib->request('/me/videos');

      $this->data["videos"] = $videos["body"]["data"];
      return view("admin." . str_slug($this->data["entity_p"]) . ".create")->with($this->data);
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param $request Request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:200',
            'ruta_video' => 'required|max:200',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $object = new Leccion();
        if ($request->has("id")) {
            $object = Leccion::where("tema_id", \session('tema_id'))->where("lec_id", $request->input("id"))->first();
        }

        $object->lec_nombre      = $request->input("nombre");
        $object->lec_descripcion = $request->has("descripcion") ? $request->input("descripcion") : ' ';
        $object->lec_url         = str_slug($request->input("nombre"));
        $object->lec_estado         = $request->input("estado");
        $object->lec_tipo         = $request->input("tipo");
        $object->lec_ruta_video         = str_replace("_","",$request->input("ruta_video"));
        $object->tema_id           = \session("tema_id");

        $object->save();

        if ($request->ajax()) {
            return 1;
        }

        return redirect()->back()->with([
            "estado" => "ok",
        ]);
    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $lib = new \Vimeo\Vimeo(Config::get("services.vimeo.client_id"),Config::get("services.vimeo.client_secret"), Session::get('vimeo_access_token'));
      $videos = $lib->request('/me/videos');

      $this->data["videos"] = $videos["body"]["data"];
      $object               = Leccion::withTrashed()->where("lec_id", $id)->where("tema_id", session("tema_id"))->first();
      $this->data["object"] = $object;
      return view("admin." . str_slug($this->data["entity_p"]) . ".create")->with($this->data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  $request Request
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $type = "software";
        if ($request->has("type")) {
            $type = $request->input("type");
        }
        $object = Leccion::withTrashed()->where("lec_id", $id)->where("tema_id", session("tema_id"))->first();
        if ($object) {

            if ($type == "software") {
                $object->delete();
            } else if ($type == "delete") {
                $object->forceDelete();
            } else if ($type == "restore") {
                $object->restore();
            }
            return redirect()->route(str_slug($this->data["entity_p"]) . ".index")->with([
                "estado"  => "ok",
                "mensaje" => $this->data["entity_pro"] . " " . $this->data["entity_s"] . " se ha " . ($type == "restore" ? ' restaurado ' : 'Eliminado') . " correctamente",
            ]);
        }

        return redirect()->route(str_slug($this->data["entity_p"]) . ".index")->with([
            "estado"  => "error",
            "mensaje" => "No se encuentra " . str_slug($this->data["entity_pro"]) . " " . $this->data["entity_s"] . " con el id: " . $id,
        ]);
    }

}

?>
