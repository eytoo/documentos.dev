<?php

namespace App\Http\Controllers;

use App\Role;
use App\Setting;
use App\User;
use App\Userl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class OtherController extends Controller
{
    public function login(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            //'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(array(
                "estado"  => "error",
                "errores" => $validator->messages(),
            ));
        }

        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('login')]);

        
        if (Auth::attempt($request->only($field, 'password'))) {
            return redirect('/home');
            /*if(Userl::find(Auth::user()->id)->trashed()){
                Auth::logout();
            }else{
                if((Auth::user()->roles()->first()->name == "administrador") || (Setting::find(1)->encendido == 1)){
                    return redirect('/home');
                }else{
                    Auth::logout();
                }    
            }*/
        }
        

        return redirect('/login')->withErrors([
            'error' => 'These credentials do not match our records.',
        ]);
    }
    
    public function guardarPermisos(Request $request)
    {
        $permissions = $request->input("permission");
        DB::table('permission_role')->truncate();
        foreach ($permissions as $r_key => $permission) {
            foreach ($permission as $p_key => $per) {
                $values[] = $p_key;
            }
            $role = Role::find($r_key);
            if (count($values)) {
                $role->attachPermissions($values);
            }

            unset($values);
        }
        return redirect()->back()->with(array(
            "estado" => "ok",
        ));
    }

    public function getBackups(){
        $datos["rutafinal"] = "storage/app/http---localhost";
        $datos["rutabase"]   = getRG() . $datos["rutafinal"];
        $datos["backups"] = array_map('basename', File::files($datos["rutabase"]));
        return view("admin.empresa.backups")->with($datos);
    }
}