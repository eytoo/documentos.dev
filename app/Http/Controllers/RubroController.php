<?php 

namespace App\Http\Controllers;

use App\Rubro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RubroController extends Controller {

    private $data = array();

    /**
     * RubroController constructor.
     */
    public function __construct()
    {
        $this->data["entity_p"] = "Rubros";
        $this->data["entity_s"] = "Rubro";
        $this->data["entity_pro"] = "El";
    }


    /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $this->data["dataList"] = Rubro::all();
      return view("admin.". strtolower($this->data["entity_p"]) .".index")->with($this->data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      return view("admin.". strtolower($this->data["entity_p"]) .".create")->with($this->data);
  }

  /**
   * Store a newly created resource in storage.
   * @param $request
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'nombre' => 'required|max:50',
      ]);
      if ($validator->fails()) {
          return response()->json(array(
              "estado"  => false,
              "errores" => $validator->messages(),
          ));
      }

      $rubro = new Rubro();
      if ($request->has("id")) {
          $rubro = rubro::find($request->input("id"));
      }

      $rubro->rubro_nombre = $request->input("nombre");
      $rubro->rubro_url = str_slug($request->input("nombre"));

      $rubro->save();

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
        $rubro         = Rubro::find($id);
        $this->data["object"] = $rubro;
        return view("admin.". strtolower($this->data["entity_p"]) .".create")->with($this->data);
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
        $object = Rubro::find($id);
        if ($object) {

            $object->delete();

            return redirect()->route(strtolower($this->data["entity_p"]) .".index")->with([
                "estado" => "ok",
                "error"  => strtolower($this->data["entity_pro"])." ". strtolower($this->data["entity_s"]) ." se ha eliminado correctamente",
            ]);
        }

        return redirect()->route(strtolower($this->data["entity_p"]) . ".index")->with([
            "estado" => "mal",
            "error"  => "No se encuentra ". strtolower($this->data["entity_pro"]) ." ". strtolower($this->data["entity_s"]) ." con el id: " . $id,
        ]);
    }
  
}

?>