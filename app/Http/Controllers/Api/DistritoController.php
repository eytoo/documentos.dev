<?php

namespace App\http\Controllers\Api;
use App\Distrito;
use Illuminate\Http\Request;
use DB;
class DistritoController extends Controller {

	public function getDistritos() {
		$distritos = DB::table('distritos')
		->select('distrito')
		->get();
		$lista = array();
		foreach ($distritos as $d) {
			$lista[] = $d->distrito;			# code...
		}
		return response()->json($lista);
	}

}