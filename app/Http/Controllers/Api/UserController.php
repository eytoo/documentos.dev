<?php

namespace App\http\Controllers\Api;

use App\Card;
use App\Carrera;
use App\Cliente;
use App\Http\Controllers\Controller;
use App\Log;
use App\User;
use App\ClienteCupones;
use Culqi\Culqi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 500,
                'message' => 'Campo requerido',
            ], 500);
        }
        //$field = (filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)? 'email' : 'username');

        $user = User::where('email', '=', $request->input('username'))
            ->where("roles_id", 1)
            ->first();

        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                return response()->json([
                    'id'    => $user->id,
                    'email' => $user->email,
                    'name'  => $user->name,
                    "foto"  => getImgUsuario($user),
                ]);
            }
        }

        return response()->json([
            'status'  => 400,
            'message' => "Las credenciales no coinciden",
        ], 400);
    }

    public function fcmToken($id,$token){
        $user = User::where('id', $id)->first();
        if($user){
            $user->token_fcm = $token;
            $user->save();
        }
    }

    public function loginFacebook(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 500,
                'message' => 'Campo requerido',
            ], 500);
        }
        //$field = (filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)? 'email' : 'username');

        $user = User::where('email', '=', $request->input('username'))
            ->where("roles_id", 1)
            ->first();

        if ($user) {
            //if(Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'email' => $user->email,
                'name'  => $user->name,
                'id'    => $user->id,
                "foto"  => getImgUsuario($user),
            ]);
            //}
        } else {
            return response()->json([
                'id'    => 0,
                'email' => " ",
                'name'  => " ",
            ]);
        }

        return response()->json([
            'status'  => 400,
            'message' => "Las credenciales no coinciden",
        ], 400);
    }

    public function loginDriver(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 500,
                'message' => 'Campos requeridos',
            ], 500);
        }
        //$field = (filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)? 'email' : 'username');

        $user = User::where('email', '=', $request->input('username'))
            ->where("roles_id", 2)
            ->first();

        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                return response()->json([
                    'id'           => $user->id,
                    'name'         => $user->name,
                    'email'        => $user->email,
                    "activo"       => $user->activo,
                    'tipoVehiculo' => $user->driver->tipo_vehiculo,
                    'foto'         => getImgUsuario($user),
                ]);
            }
        }

        return response()->json([
            'status'  => 400,
            'message' => "Las credenciales no coinciden",
        ], 400);
    }

    public function register(Request $request)
    {

        $log          = new Log();
        $log->detalle = json_encode($request->all());
        $log->save();

        $validator = Validator::make($request->all(), [
            'name'     => 'required|max:100',
            'email'    => 'required|max:255|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 500,
                'message' => 'Internal Serve Error',
            ], 500);
        }

        $user = new User;

        if (!$this->verificarNuevoUsuario($request)) {

            $user->name          = $request->input('name');
            $user->email         = $request->input('email');
            $user->password      = Hash::make($request->input('password'));
            $user->telefono      = $request->input('telefono');
            $user->roles_id      = 1;
            $user->user_reg_modo = $request->input("modo");
            if ($request->has("direccion")) {
                $user->direccion = $request->input("direccion");
            }

            if ($request->input("modo") == "Correo" && $request->hasFile('foto')) {
                $user->user_foto = $request->file('foto')->storeAs(
                    'imagenes/usuarios', "imagen-usuario-" . date("dmYHis") . "." . $request->file('foto')->getClientOriginalExtension()
                );
            }

            if ($request->input("modo") != "Correo") {
                $user->user_foto = $request->input("fotosocial");
            }

            if ($user->save()) {

                $cliente           = new Cliente();
                $cliente->users_id = $user->id;
                $cliente->save();

                return response()->json([
                    'status'  => 200,
                    'message' => 'Usuario Registrado',
                    'email'   => $user->email,
                    'name'    => $user->name,
                    'id'      => $user->id,
                    "foto"    => getImgUsuario($user),
                ]);
            }
        } else {
            return response()->json([
                'status'  => 500,
                'message' => 'Ya existe un usuario con estos datos',
            ], 500);
        }

        return response()->json([
            'status'  => 400,
            'message' => 'No se pudo registrar lo sentimos.',
        ]);
    }

    private function verificarNuevoUsuario($request)
    {
        $existe    = false;
        $userCount = User::where("email", $request->input("email"))
            ->where("roles_id", 1)
            ->count();
        if ($userCount > 0) {
            $existe = true;
        }
        return $existe;
    }

    public function getUsuario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 500,
                'message' => 'Internal Serve Error',
            ], 500);
        }

        $user = User::find($request->input("id"));

        if ($user) {
            return response()->json([
                'status'  => 200,
                'message' => 'Usuario Registrado',
                'email'   => $user->email,
                'name'    => $user->name,
                'id'      => $user->id,
                'activo'  => $user->activo,
                'foto'    => getImgUsuario($user),
            ]);
        }

        return response()->json([
            'status'  => 400,
            'message' => 'Usuario no encotrado',
        ]);
    }

    public function getTarjetas($id)
    {
        $user = User::find($id);
        return $user->cards;
    }

    public function crearTarjeta(Request $request)
    {

        $log          = new Log();
        $log->detalle = json_encode($request->all());
        $log->save();
        $codigo_cliente = null;

        $SECRET_KEY = "sk_test_4xsJP4PObjRpOPMr";
        $culqi      = new Culqi(array('api_key' => $SECRET_KEY));
        $usuario    = User::where("id", $request->input("usuario"))->first();

        if (is_null($usuario->cod_cliente)) {
            $customer = $culqi->Customers->create(
                array(
                    "address"      => $usuario->direccion,
                    "address_city" => "lima",
                    "country_code" => "PE",
                    "email"        => $usuario->email,
                    "first_name"   => $this->split_name($usuario->name)[0],
                    "last_name"    => $this->split_name($usuario->name)[1],
                    "metadata"     => array("id" => $usuario->id),
                    "phone_number" => intval($usuario->telefono),
                )
            );

            $log          = new Log();
            $log->detalle = json_encode($customer);
            $log->save();

            $usuario->cod_cliente = $customer->id;
            $usuario->save();

            $codigo_cliente = $customer->id;
        }

        $log          = new Log();
        $log->detalle = json_encode($request->all());
        $log->save();

        $tarjeta = $culqi->Cards->create(
            array(
                "customer_id" => is_null($usuario->cod_cliente) ? $codigo_cliente : $usuario->cod_cliente,
                "token_id"    => $request->input("codigo"),
            )
        );

        $card              = new Card();
        $card->codigo      = $tarjeta->id;
        $card->descripcion = $request->input("tarjeta");
        $card->tarjeta     = $request->input("numero");
        $card->user_id     = $request->input("usuario");
        if (count($usuario->cards) == 0) {
            $card->defecto = 1;
        }

        if ($card->save()) {
            return response()->json(array(
                "codigo"  => 200,
                "mensaje" => "Tarjeta creada",
            ));
        }

        return response()->json(array(
            "codigo"  => 500,
            "mensaje" => "Datos ingresados son incorrectos",
        ));

    }

    private function split_name($name)
    {
        $name       = trim($name);
        $last_name  = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim(preg_replace('#' . $last_name . '#', '', $name));
        return array($first_name, $last_name);
    }

    public function cambiarTarjeta($id, $tarjeta)
    {
        $cardsUsuario = Card::where("user_id", $id)->get();
        foreach ($cardsUsuario as $c) {
            $c->defecto = 0;
            $c->save();
        }

        $card          = Card::where("user_id", $id)->where("id", $tarjeta)->first();
        $card->defecto = 1;
        if ($card->save()) {
            return response()->json(array(
                "codigo"  => 200,
                "mensaje" => "Tarjeta creada",
            ));
        }

        return response()->json(array(
            "codigo"  => 500,
            "mensaje" => "Datos ingresados son incorrectos",
        ));
    }

    public function buscarUsuario($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json([
                'email'     => $user->email,
                'telefono'  => $user->telefono,
                'name'      => $user->name,
                'id'        => $user->id,
                'activo'    => $user->activo,
                'foto'      => getImgUsuario($user),
                'direccion' => is_null($user->direccion) ? "" : $user->direccion,
            ]);
        }
    }

    public function actualizarUsuario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|max:255',
            //'telefono'  => 'required',
            'direccion' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "codigo"  => 500,
                "mensaje" => "Datos incorrectos",
            ));
        }
        //$field = (filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)? 'email' : 'username');

        $user = User::find($request->input("id"));

        if ($user) {
            $user->name      = $request->input("name");
            //$user->telefono  = $request->input("telefono");
            $user->direccion = $request->input("direccion");
            if ($request->has("password")) {
                $user->password = Hash::make($request->input("password"));
            }

            if ($request->hasFile('foto')) {
                $user->user_foto = $request->file('foto')->storeAs(
                    'imagenes/usuarios', "imagen-usuario-" . date("dmYHis") . "." . $request->file('foto')->getClientOriginalExtension()
                );
            }

            if ($user->save()) {
                return response()->json(array(
                    "codigo"  => 200,
                    "mensaje" => "Información actualizada",
                ));
            }
        }

        return response()->json(array(
            "codigo"  => 500,
            "request" => $request->all(),
            "mensaje" => "No se pudo actualizar los datos del usuario",
        ));
    }

    public function enviarEmail($email)
    {
        $carrera = Carrera::find($email);
        //$user = User::where("");
        $this->enviarCorreo($carrera);
    }

    private function enviarCorreo($carrera){

        Mail::send('email.email-carrera-usuario', ["carrera"=>$carrera], function ($m) use ($carrera) {
            $m->from('no-reply@guiodriver.com', 'Guio Driver');

            $m->to($carrera->cliente->user->email, $carrera->cliente->user->name)->subject('La carrera con destino ('. $carrera->ruta->destino->name .') ha sido iniciada');
        });

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function cuponesListar($nuser_id)
    {
        /*
        Objetivo : Listar a los clientes segun el estado que mantengan
         */
        // objeto tipo cliente
        $cliente_cupones = new ClienteCupones();

        // retorno de datos
        return response()->json(ClienteCupones::where("user_id", "=", $nuser_id)->where("estado",0)->get());
    }
}
