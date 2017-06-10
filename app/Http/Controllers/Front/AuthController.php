<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Socialite;
use App\User;
use Hash;

class AuthController extends Controller
{
    public function authorise($provider = 'google')
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Realiza el logueo con distintas redes sociales
     *
     * @param   string     $provider    El nombre de la red social
     * @param   Request    $request
     * @return  redirect
     */
    public function socialLogin($provider = 'google', Request $request)
    {
        $ulogin = Socialite::driver($provider)->user();
        var_dump($ulogin);
        return null;

        if (strlen($ulogin->getEmail())) {

            if (count(User::where("email", "=", $ulogin->getEmail())->get()) == 0) {
                $user             = new User();
                $user->name       = $ulogin->getName();
                $user->email      = $ulogin->getEmail();
                $user->avatar     = $ulogin->getAvatar();
                $user->confirmado = 1;
                $user->modo       = $provider;
                $user->estado     = 1;
                $user->save();

                $authUser = User::where("email", "=", $ulogin->getEmail())->first();
                Auth::login($authUser, true);
                //dd($ulogin);
            } else {
                $authUser = User::where("email", "=", $ulogin->getEmail())->first();
                Auth::login($authUser, true);
                //return redirect()->to("/");
            }
        }
        if (Auth::check()) {
            if (subs()) {
                Session::forget('plan');
                Session::forget('proceso');
            }
        }
        if (session('proceso')) {
            return redirect()->to("suscripcion/pagar");
        } else {
            return redirect()->to("/");
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            if($request->ajax()){
              return response()->json(array(
                "errors" => true,
                "message" => "Error de validación de campos",
                "inputs" => $validator->messages()
              ));
            }
            return redirect()->back()->with(array(
                "errors" => true,
                "message" => "Error de validación de campos",
                "inputs" => $validator->messages()
            ));
        }

        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('login')]);

        if (Auth::guard("client")->attempt($request->only($field, 'password'))) {

            if(request()->ajax()){
              return response()->json(array(
                "message"=>"Se ha iniciado sesión correctamente",
                "action"=>"login"
              ));
            }

            return redirect()->back(array(
              "errors"=>false,
              "message"=>"Se ha iniciado sesión correctamente"
            ));
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

        if($request->ajax()){
          return response()->json(array(
            "errors" => true,
            "message" => "Usuario/Contraseña incorrectos",
          ));
        }

        return redirect('/')->back([
            "errors" => true,
            "message" => "Usuario/Contraseña incorrectos",
        ]);
    }

    public function logout()
    {
      Auth::guard("client")->logout();
      return redirect()->to("/");
    }

    public function registro(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'   => 'required|min:5',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
          if($request->ajax()){
            return response()->json(array(
              "errors" => true,
              "message" => "Error de validación de campos",
              "inputs" => $validator->messages()
            ));
          }
          return redirect()->back()->with(array(
              "errors" => true,
              "message" => "Error de validación de campos",
              "inputs" => $validator->messages()
          ));
        }

        $codigoConfirmacion = str_random(60);

        $user             = new User();
        $user->user_nombre      = $request->input('nombre');
        $user->user_apellidos   = "";
        $user->email            = $request->input('email');
        $user->password         = Hash::make($request->input('password'));
        //$user->estado     = 0;
        $user->user_confirmado     = 0;
        $user->user_reg_modo       = 'email';
        $user->user_conf_code       = $codigoConfirmacion;
        $user->user_foto   = "usuario/foto/foto-usuario-cursania.png";
        $user->user_ip = str_slug($request->input("nombre"));

        $user->save();

        //$data["conf"] = $codigoConfirmacion;
        //$data["user"] = $user->name;
        /*Mail::send('emails.verificar', $data, function ($message) use ($user) {
            $message->from('web@formandocodigo.com', 'Formando Código');
            $message->to($user->email, $user->name)->subject('Confirma tu dirección de correo electronico');
        });*/

        Auth::guard("client")->attempt(['email' => $request->input('email'), 'password' => $request->input("password")]);

        $url = "/";
        /*if (session('proceso') != null && session('proceso') == "pagar") {
            $url = "/suscripcion/pagar";
        }*/

        return response()->json(array(
            "errors"=>false,
            "message"=>"Tu cuenta ha sido creada, te estamos redirigiendo...",
            "url"    => $url,
        ));

    }
}
