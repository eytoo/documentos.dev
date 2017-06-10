<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Curso;
use App\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    /**
     * CursoController constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"]   = "Cursos";
        $this->data["entity_s"]   = "Curso";
        $this->data["entity_pro"] = "El";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->data["dataList"] = Curso::with("categoria")->get();
        return view("admin." . str_slug($this->data["entity_p"]) . ".index")->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->data["categorias"] = Categoria::all();
        $this->data["profesores"] = Profesor::all();
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
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'nombre'      => 'required|max:200',
            'slogan'      => 'required',
            'categoria'   => 'required',
            'duracion'    => 'required',
            'tipo'        => 'required',
            'etiquetas'   => 'required',
            'descripcion' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "estado"  => false,
                "errores" => $validator->messages(),
            ));
        }

        $object = new Curso();
        if ($request->has("id")) {
            $object = Curso::find($request->input("id"));
        }

        $object->cat_id          = $request->input("categoria");
        $object->prof_id         = $request->input("profesor");
        $object->cur_nombre      = $request->input("nombre");
        $object->cur_slogan      = $request->input("slogan");
        $object->cur_descripcion = $request->input("descripcion");
        $object->cur_estado      = $request->input("estado");
        $object->cur_etiquetas   = $request->input("etiquetas");
        $object->cur_duracion    = $request->input("duracion");
        $object->cur_certificado = $request->input("certificado");
        $object->cur_color       = $request->input("color");
        $object->cur_gratuito    = $request->input("gratuito");
        if ($object->cur_gratuito == 0) {
            $object->cur_tipo   = $request->input("tipo");
            $object->cur_precio = $request->input("precio");
        }

        // Configuración en preventa
        $object->en_preventa   = $request->input("en_preventa");
        if ($request->has("en_preventa") && $request->input("en_preventa") == 1) {
            $object->pre_videos = $request->input("pre_videos");
            $object->pre_fecha = $request->input("pre_fecha");
        }

        $object->cur_url = str_slug($request->input("nombre"));

        if ($request->hasFile('icono')) {
            $object->cur_icono = $request->file('icono')->storeAs(
                'cursos/iconos', "icono-curso-" . $object->cur_url . "." . $request->file('icono')->getClientOriginalExtension()
            );
        }

        if ($request->hasFile('portada')) {
            $object->cur_portada = $request->file('portada')->storeAs(
                'cursos/portadas', "portada-curso-" . $object->cur_url . "." . $request->file('portada')->getClientOriginalExtension()
            );
        }

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
        $object                   = Curso::find($id);
        $this->data["object"]     = $object;
        $this->data["categorias"] = Categoria::all();
        $this->data["profesores"] = Profesor::all();
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
     * @return Response
     */
    public function destroy($id)
    {

    }

}
