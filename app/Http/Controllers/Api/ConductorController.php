<?php

namespace App\http\Controllers\Api;

use App\Carro;
use App\Cliente;
use App\Comentario;
use App\Driver;
use App\Http\Controllers\Controller;
use App\Log;
use App\Marca;
use App\Modelo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ConductorController extends Controller
{

    /**
     * Registra un conductor en la báse de datos
     *
     * @param Request $request
     * @return response
     */
    public function register(Request $request)
    {
        $log          = new Log();
        $log->detalle = json_encode($request->all());
        $log->save();

        $validator = Validator::make($request->all(), [
            'nombres'   => 'required|max:100',
            'apellidos' => 'required|max:100',
            'telefono'  => 'required|max:9',
            'email'     => 'required|max:60|email',
            'password'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => 500,
                'message' => 'Ingrese su información correctamente',
            ], 500);
        }
        if ($this->verificarNuevoUsuario($request)) {
            return response()->json([
                'status'  => 500,
                'message' => 'Ya existe un usuario con estos datos, inicia sesión',
            ], 500);
        }
        //USUARIO
        $user                = new User;
        $user->name          = $request->input('nombres');
        $user->email         = $request->input('email');
        $user->password      = Hash::make($request->input('password'));
        $user->telefono      = $request->input('telefono');
        $user->roles_id      = 2;
        $user->user_reg_modo = "Correo";
        if ($request->hasFile('file1')) {
            $user->user_foto = $request->file('file1')->storeAs(
                'imagenes/perfil', "icono-perfilusuario-" . date('dmYHis') . "." . $request->file('file1')->getClientOriginalExtension()
            );
        }
        $user->save();
        //Chofer
        $conductor                = new Driver();
        $conductor->users_id      = $user->id;
        $conductor->nombres       = $request->input("nombres");
        $conductor->apellidos     = $request->input("apellidos");
        $conductor->fechanac      = date("Y-m-d", strtotime($this->parseDate($request->input("fechanac"))));
        $conductor->genero        = $request->input("genero");
        $conductor->direccion     = $request->input("direccion");
        $conductor->dni           = $request->input("dni");
        $conductor->tipo_vehiculo = $request->input("soat");
        $conductor->licencia      = $request->input("licencia");
        $conductor->fechacadlic   = date("Y-m-d", strtotime($this->parseDate($request->input("fechacadlic"))));
        $conductor->save();
        //marca & modelo
        return response()->json([
            'status'       => 200,
            'message'      => 'Conductor Registrado',
            'email'        => $user->email,
            'name'         => $user->name,
            'id'           => $user->id,
            'activo'       => $user->activo,
            'tipoVehiculo' => $conductor->tipo_vehiculo,
            'foto'         => url('imagenes/' . $user->user_foto),
        ]);
    }

    /**
     * Verifica si el usuario ya existe en la báse de datos
     *
     * @param Request $request
     * @return boolean
     */
    private function verificarNuevoUsuario($request)
    {
        $existe    = false;
        $userCount = User::where("email", $request->input("email"))
            ->where("roles_id", 2)
            ->count();
        if ($userCount > 0) {
            $existe = true;
        }
        return $existe;
    }

    /**
     * Realiza el login por facebook
     *
     * @param Request $request
     * @return response
     */
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
            ->where("roles_id", 2)
            ->first();

        if ($user) {
            //if(Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'email'        => $user->email,
                'name'         => $user->name,
                'id'           => $user->id,
                'tipoVehiculo' => $user->driver->tipo_vehiculo,
                "foto"         => getImgUsuario($user),
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

    /**
     * Parsea la fecha a date
     *
     * @param string $fecha
     * @return date
     */
    private function parseDate($fecha)
    {
        $fechaArray = explode("/", $fecha);
        $dt         = Carbon::createFromDate($fechaArray[2], $fechaArray[1], $fechaArray[0]);
        return $dt;
    }

    /**
     * Busca un conductor por su id
     *
     * @param integer $id
     * @return array
     */
    public function getBuscar($id)
    {
        $conductor = User::find($id);
        $data      = array(
            //Usuario
            "id"        => $conductor->id,
            "nombres"   => $conductor->driver->nombres,
            "apellidos" => $conductor->driver->apellidos,
            "email"     => $conductor->telefono,
            "foto"      => getImgUsuario($conductor),
            //Vehiculo
            "marca"     => $conductor->driver->carro->marca->name,
            "modelo"    => $conductor->driver->carro->modelo->name,
            "tipo"      => $conductor->driver->carro->tipo,
            "placa"     => $conductor->driver->carro->placa,
            "capacidad" => $conductor->driver->carro->capacidad,
            "anio"      => $conductor->driver->carro->anio,
            "imagenv"   => url("imagenes/" . $conductor->driver->carro->imagen),
        );
        return $data;
    }

    public function puntuarConductor($id, $iduser, $puntos)
    {
        $client                 = Cliente::where("users_id", $iduser)->first();
        $comentario             = new Comentario();
        $comentario->comment    = " ";
        $comentario->puntos     = $puntos;
        $comentario->clients_id = $client->id;
        $comentario->drivers_id = $id;

        if ($comentario->save()) {
            return response()->json(array(
                "codigo"  => 200,
                "mensaje" => "Se agregaron los puntos correctamente",
            ));
        }

        return response()->json(array(
            "codigo"  => 500,
            "mensaje" => "No se pudo calificar al conductor",
        ));

    }
}
