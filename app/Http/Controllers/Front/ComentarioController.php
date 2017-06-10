<?php

namespace App\Http\Controllers\Front;

use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Crypt;
use Session;
use App\Comentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{

    /**
     * Redirecciona a una URL
     *
     * @param string $url
     * @return view
     */
    public function getRedireccionar(Request $request)
    {
        $url = Crypt::decrypt($request->input("data"));
        return redirect($url);
    }

    public function getFormComnetario($tipo,$cont_id,$cont_url,Request $request)
    {
      $data = array(
          "tipo"=>$tipo,
          "cont_id"=>$cont_id,
          "cont_url"=>$cont_url
      );
      if($request->has("com_id")){
        $com = Comentario::with("user")->where("com_id",$request->input("com_id"))->first();
        $data["com"] = $com;
      }
      if(request()->ajax()){
          return view("frontend.template.v1.modal.comentario")->with($data);
      }
      return "error";
    }

    /**
     * Publica un comentario
     *
     * @param string $url
     * @return view
     */
    public function postComentario(Request $request)
    {
        if($request->has("tipo")
           && $request->has("cont_id")
           && $request->has("cont_url")){

            $tipo = $request->input("tipo");
            $cont_id = $request->input("cont_id");
            $cont_url = $request->input("cont_url");

            $validator = Validator::make($request->all(), [
                'descripcion' => 'required|max:500',
                'calificacion' => 'required',
            ]);

            if ($validator->fails()) {
                if($request->ajax()){
                  return response()->json(array(
                    "errors" => true,
                    "message" => "La información ingresada es incorrecta",
                    "inputs" => $validator->messages()
                  ));
                }
                return redirect()->route($tipo,[$cont_url])->with(array(
                    "errors" => true,
                    "message" => "La información ingresada es incorrecta",
                    "inputs" => $validator->messages()
                ));
            }

            if($request->isMethod("post")){
              if(request()->ajax()){
                  if($this->guardarComentario($request)){
                    return response()->json(array(
                      "message"=>"Tu comentario ha sido enviado, estará publicado en un momento"
                    ));
                  }
              }
            }else{
              if($request->has("codigo")){
                  if(Session::get("codigo") == $request->input("codigo")){
                    if($this->guardarComentario($request)){
                      if(request()->ajax()){
                        return response()->json(array(
                          "message"=>"Tu comentario ha sido enviado, estará publicado en un momento"
                        ));
                      }
                      Session::forget("codigo");
                      return redirect()->to($tipo."/".$cont_url."?op=comentarios#comentarios")->with(array(
                          "errors"=>false,
                          "message"=>"Tu comentario ha sido enviado, estará publicado en un momento"
                      ));
                    }
                  }
              }
            }

            if(request()->ajax()){
                return response()->json(array(
                  "errors"=>true,
                  "message"=>"Operación invalida en comentarios, verificando acciones"
                ));
            }
            return redirect()->route($tipo,[$cont_url])->with(array(
                "errors"=>true,
                "message"=>"Tenemos problemas para publicar su comentario"
            ));
        }

        return redirect()->to("/")->with(array(
            "errors"=>true,
            "message"=>"Operación invalida en comentarios, verificando acciones"
        ));
    }

    private function guardarComentario($request)
    {
      $com = new Comentario();
      $com->user_id = Auth::guard("client")->user()->id;
      $com->com_calificacion = $request->input("calificacion");
      $com->com_cont_id = $request->input("cont_id");
      $com->com_tipo = $request->input("tipo");
      $com->com_descripcion = $request->input("descripcion");

      if($request->has("com_id")){
        $com->com_parent_id = $request->input("com_id");
      }

      if($com->save()){
        return true;
      }
      return false;
    }
}
