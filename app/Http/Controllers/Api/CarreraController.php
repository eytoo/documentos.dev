<?php

namespace App\Http\Controllers\Api;

use App\Card;
use App\Carrera;
use App\Cliente;
use App\ClienteCupones;
use App\Driver;
use App\Http\Controllers\Controller;
use App\Log;
use App\Premio;
use App\Punto;
use App\Ruta;
use App\Ticket;
use Carbon\Carbon;
use Culqi\Culqi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CarreraController extends Controller
{
    public function crearCarrera(Request $request)
    {

        $log          = new Log();
        $digits       = 4;
        $path         = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        $log->detalle = json_encode($request->all());
        $log->save();
        /*
        return response()->json(array(
        "codigo"  => 200,
        "mensaje" => "Error al crear la carrera",
        ));*/

        $origen          = new Punto();
        $origen->address = $request->input("llOrigen");
        $origen->name    = $request->input("origen");
        $origen->save();

        $destino          = new Punto();
        $destino->address = $request->input("llDestino");
        $destino->name    = $request->input("destino");
        $destino->save();

        $ruta                  = new Ruta();
        $ruta->description     = "carrera";
        $ruta->sources_id      = $origen->id;
        $ruta->destinations_id = $destino->id;
        $ruta->save();

        $conductor = Driver::where("users_id", $request->input("id"))->first();
        $cliente   = Cliente::where("users_id", "=", $request->input("idusuario"))->first();

        $carrera             = new Carrera();
        $carrera->routes_id  = $ruta->id;
        $carrera->drivers_id = $conductor->id;
        $carrera->price      = $request->input("tarifae");
        /*$carrera->tarifaref       = $request->input("tipo") == 1 ? $request->input("tarifae") : $request->input("tarifar");*/
        $carrera->available_seats = 0;
        $digits                   = 4;
        $path                     = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        $carrera->codigo_auto_gen = $path;
        //$carrera->cars_id         = $conductor->carro->id;
        $carrera->statuses_id   = 1;
        //$carrera->cupon_monto = ;
        $carrera->clie_id       = $cliente->id;
        $carrera->paytip_id     = $request->input("tipoPago");
        $carrera->distancia     = $request->input("distancia");
        $carrera->tiempo     = $request->input("tiempo");
        $carrera->cupon_id      = $request->input("cupon_id");
        $carrera->cupon_monto   = $request->has("cupon_monto") ? $request->input("cupon_monto") : 0.00;
        //$carrera->tipo        = $request->input("tipo");

        if ($carrera->save()) {

            $this->enviarCorreo($carrera);

            return response()->json(array(
                "codigo"  => 200,
                "mensaje" => "Tu solicitud de taxi ha sido creada",
                "data"    => json_encode(array("idcarrera" => $carrera->id)),
            ));
        }

        return response()->json(array(
            "codigo"  => 500,
            "mensaje" => "Error al crear la carrera",
        ));

    }

    private function enviarCorreo($carrera){

        Mail::send('email.email-carrera-usuario', ["carrera"=>$carrera], function ($m) use ($carrera) {
            $m->from('no-reply@guiodriver.com', 'Guio Driver');

            $m->to($carrera->cliente->user->email, $carrera->cliente->user->name)->subject('La carrera con destino ('. $carrera->ruta->destino->name .') ha sido iniciada');
        });

        Mail::send('email.email-carrera-conductor', ["carrera"=>$carrera], function ($m) use ($carrera) {
            $m->from('no-reply@guiodriver.com', 'Guio Driver');

            $m->to($carrera->driver->user->email, $carrera->driver->nombres . " " . $carrera->driver->apellidos)->subject('La carrera con destino ('. $carrera->ruta->destino->name .') ha sido iniciada');
        });

    }

    ////////////////////////////////////////////////////////////////////////////////////
    public function EstadosCarrera($id, $nEstado)
    {
        // buscar por el codigo

        $log          = new Log();
        $log->detalle = $id ." - ". $nEstado;
        $log->save();

        $carrera = Carrera::find($id);
        $estado_carrera = $carrera->statuses_id;
        //cambiar el estado
        // 1 --> en camino , 2 --> carrera , 3 --> finalizado , 4 --> cancelado
        $carrera->statuses_id = $nEstado;

        if ($carrera->statuses_id == 3) {
            if ($this->realizarCobro($carrera)) {
                if ($carrera->save()) {
                    return response()->json(array(
                        "codigo"  => 200,
                        "mensaje" => "El estado ha sido actualizado",
                    ));
                }
            } else {
                return response()->json(array(
                    "codigo"  => 500,
                    "mensaje" => "La tarjeta ha sido declinada",
                ));
            }
        } else {

            if ($carrera->statuses_id == 4) {
                if ($estado_carrera == 2) {
                    $this->generarTicketPropio($carrera,60*100);

                    sendNotification($carrera->cliente->user->token_fcm,"Se ha facturado S/60.00","Penalidad por cancelar el servicio",array("accion"=>"confirmar"),"high");
                }
            }

            if ($carrera->statuses_id == 5) {
                sendNotification($carrera->cliente->user->token_fcm,"El conductor ha llegado","Confirma el código de seguridad pronto",array("accion"=>"confirmar"),"high");
                $carrera->llego_conductor = date("Y-m-d H:i:s");
            }

            if ($carrera->save()) {
                return response()->json(array(
                    "codigo"  => 200,
                    "mensaje" => "El estado ha sido actualizado",
                ));
            }
        }

        return response()->json(array(
            "codigo"  => 500,
            "mensaje" => "Error al actualizar la carrera",
        ));
    }

    public function confirmarCarrera($id){
        $carrera = Carrera::find($id);
        sendNotificationChofer($carrera->driver->user->token_fcm,"El usuario ha confirmado","Presiona aquí para validarlo ahora",array("accion"=>"confirmar"),"high");
        $carrera->hora_confirma = date("Y-m-d H:i:s");
        $tiempo_inicio = Carbon::parse($carrera->llego_conductor);
        $tiempo_final = Carbon::parse($carrera->hora_confirma);
        $minutos = $tiempo_final->diffInMinutes($tiempo_inicio);
        $minutosTotal = 0;
        if($minutos > 10){
            $minutosTotal = $minutos - 10;
        }

        $penalidad = $minutosTotal * 0.50;
        $carrera->penalidad_demora = $penalidad;

        $carrera->save();
    }

    private function realizarCobro($carrera)
    {
        $estado = false;
        switch ($carrera->paytip_id) {
            case 0:
                $estado = true;
                $this->generarTicket($carrera);
                $this->generarPunto($carrera);
                break;
            case 1:
                $estado = true;
                $this->generarTicket($carrera);
                $this->generarPunto($carrera);
                break;
            default:
                break;
        }

        return $estado;
    }

    private function generarTicket($carrera)
    {
        $estado = false;

        $ticket                   = new Ticket();
        $ticket->rides_id         = $carrera->id;
        $ticket->clients_id       = $carrera->clie_id;
        $ticket->payment_types_id = 1;
        if ($ticket->save()) {

            $SECRET_KEY = "sk_test_4xsJP4PObjRpOPMr";
            $culqi      = new Culqi(array('api_key' => $SECRET_KEY));

            //return $id;
            $carrera = Carrera::find($carrera->id);
            //return $carrera;
            $cliente = $carrera->cliente;
            $tarjeta = Card::where("user_id", $cliente->users_id)->where("defecto", 1)->first();
            $token   = $tarjeta->makeVisible("codigo")->codigo;

            $datosCobro = array(
                "amount"        => $carrera->price * 100,
                "capture"       => true,
                "currency_code" => "PEN",
                "description"   => "Carrera finalizada con el código: #" . $carrera->id,
                "email"         => $carrera->cliente->user->email,
                "metadata"      => array(
                    "conductor" => $carrera->driver->nombres . " " . $carrera->driver->apellidos,
                    "cliente"   => $carrera->cliente->user->name,
                ),
                "installments"  => 0,
                "source_id"     => $token,
            );

            $charge = $culqi->Charges->create($datosCobro);

            Mail::send('email.email-recibo-usuario', ["carrera"=>$carrera,"ticket"=>$ticket,"tarjeta"=>$tarjeta], function ($m) use ($carrera) {
                $m->from('no-reply@guiodriver.com', 'Guio Driver');
                $m->to($carrera->cliente->user->email, $carrera->cliente->user->name)->subject('Carrera finalizada #'. $carrera->
                codigo_auto_gen);
            });

            Mail::send('email.email-recibo-conductor', ["carrera"=>$carrera,"ticket"=>$ticket,"tarjeta"=>$tarjeta], function ($m) use ($carrera) {
                $m->from('no-reply@guiodriver.com', 'Guio Driver');
                $m->to($carrera->driver->user->email, $carrera->driver->nombres . " " . $carrera->driver->apellidos)->subject('Carrera finalizada #'. $carrera->
                codigo_auto_gen);
            });
            
            $estado = true;
        }

        return $estado;
    }

    private function generarTicketPropio($carrera,$valor)
    {
        $estado = false;

        $ticket                   = new Ticket();
        $ticket->rides_id         = $carrera->id;
        $ticket->clients_id       = $carrera->clie_id;
        $ticket->payment_types_id = 1;
        if ($ticket->save()) {

            $SECRET_KEY = "sk_test_4xsJP4PObjRpOPMr";
            $culqi      = new Culqi(array('api_key' => $SECRET_KEY));

            //return $id;
            $carrera = Carrera::find($carrera->id);
            //return $carrera;
            $cliente = $carrera->cliente;
            $tarjeta = Card::where("user_id", $cliente->users_id)->where("defecto", 1)->first();
            $token   = $tarjeta->makeVisible("codigo")->codigo;

            $datosCobro = array(
                "amount"        => $valor,
                "capture"       => true,
                "currency_code" => "PEN",
                "description"   => "Carrera finalizada con el código: #" . $carrera->id,
                "email"         => $carrera->cliente->user->email,
                "metadata"      => array(
                    "conductor" => $carrera->driver->nombres . " " . $carrera->driver->apellidos,
                    "cliente"   => $carrera->cliente->user->name,
                ),
                "installments"  => 0,
                "source_id"     => $token,
            );

            $charge = $culqi->Charges->create($datosCobro);

            /*Mail::send('email.email-recibo-usuario', ["carrera"=>$carrera,"ticket"=>$ticket,"tarjeta"=>$tarjeta], function ($m) use ($carrera) {
                $m->from('no-reply@guiodriver.com', 'Guio Driver');
                $m->to($carrera->cliente->user->email, $carrera->cliente->user->name)->subject('Carrera finalizada #'. $carrera->
                codigo_auto_gen);
            });

            Mail::send('email.email-recibo-conductor', ["carrera"=>$carrera,"ticket"=>$ticket,"tarjeta"=>$tarjeta], function ($m) use ($carrera) {
                $m->from('no-reply@guiodriver.com', 'Guio Driver');
                $m->to($carrera->driver->user->email, $carrera->driver->nombres . " " . $carrera->driver->apellidos)->subject('Carrera finalizada #'. $carrera->
                codigo_auto_gen);
            });*/
            
            $estado = true;
        }

        return $estado;
    }

    private function generarPunto($carrera)
    {
        $estado = false;

        $punto = new Premio();
        if (Premio::where("user_id", $carrera->cliente->user->id)->count() > 0)
        {
            $punto         = Premio::where("user_id", $carrera->cliente->user->id)->first();
            $punto->puntos = $punto->puntos + 1;

            if ($punto->puntos == 10)
            {
                // variables para el codigo y para el recorrido del bucle
                $codigo_auto;
                $bbucle = true;
                // bucle , hasta generar el codigo
                while ($bbucle)
                {   //auto generar el codigo
                    $codigo_auto        = $this->getRandomCode();

                    //consultar la existencia del codigo
                    $clie_cupo          = ClienteCupones::where("codigo", "=", $codigo_auto)->first();

                    // si el codigo no existe bucle
                    if(!$clie_cupo)
                    {
                        $bbucle         = false;
                    }
                }
                // nuevo cupon
                $clie_cup               = new ClienteCupones();
                $clie_cup->codigo       = $codigo_auto;
                $clie_cup->porcentaje   = "70";
                $clie_cup->user_id      = $carrera->cliente->user->id;
                $clie_cup->estado       = 0;
                $clie_cup->monto_maximo = 100;
                $clie_cup->save();
                // puntos de conteo
                $punto->puntos          = 1;
            }
        }
        else
        {
            $punto->user_id             = $carrera->cliente->user->id;
            $punto->puntos              = 1;
            $punto->carreras_pendientes = 0;
        }

            // guardamos los puntos 
            if ($punto->save()) {
                $estado = true;
            }

        return $estado;
    }
    ////////////////////////////////////////////////////////////////////////////////////
    public function getRandomCode(){
        $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $su = strlen($an) - 1;
        return substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1);
    }
    ////////////////////////////////////////////////////////////////////////////////////
    public function MontoCarrera($id, $nmonto)
    {
        // buscar por el codigo
        $carrera = Carrera::find($id);

        //cambiar el estado
        // 1 --> en camino , 2 --> carrera , 3 --> finalizado , 4 --> cancelado
        $carrera->price = $nmonto;

        if ($carrera->save()) {
            return response()->json(array(
                "codigo"  => 200,
                "mensaje" => "El monto ha sido actualizado",
            ));
        }

        return response()->json(array(
            "codigo"  => 500,
            "mensaje" => "Error al actualizar el monto",
        ));
    }
////////////////////////////////////////////////////////////////////////////////////
    public function buscarCarrera($id)
    {
        $data = array();

        $carrera             = Carrera::find($id);
        $data["idCarrera"]   = $carrera->id;
        $data["estado"]      = $carrera->statuses_id;
        $data["nombre"]      = $carrera->cliente->user->name;
        $data["email"]       = $carrera->cliente->user->email;
        $data["telefono"]    = $carrera->cliente->user->telefono;
        $data["foto"]        = getImgUsuario($carrera->cliente->user);
        $data["tarifa"]      = number_format($carrera->price, 2);
        $data["tarifaRef"]   = 0;
        $data["puntos"]      = 4;
        $data["formaPago"]   = $carrera->paytip_id;
        $data["distancia"]   = $carrera->distancia;
        $data["tiempo"]   = $carrera->tiempo;
        $data["codigo"]      = $carrera->codigo_auto_gen;
        $data["origen"]      = $carrera->ruta->origen->name;
        $data["destino"]     = $carrera->ruta->destino->name;
        $data["llDestino"]   = $carrera->ruta->destino->address;
        $data["llOrigen"]    = $carrera->ruta->origen->address;
        $data["tipo"]        = 1;
        $data["idCliente"]   = $carrera->clie_id;
        $data["idCliUser"]   = $carrera->cliente->user->id;
        $data["idConductor"] = $carrera->driver->id;
        $data["idCondUser"]  = $carrera->driver->users_id;
        $data["cupon_id"]    = $carrera->cupon_id;
        $data["cupon_monto"] = $carrera->cupon_monto;

        return $data;
    }

    public function buscarCarreraUsuario($id)
    {
        $data = array();

        $carrera = Carrera::find($id);

        $tiempo_actual = Carbon::now();
        $tiempo_inicio = Carbon::parse($carrera->llego_conductor);
        //diffInMinutes(), diffInSeconds()

        //sendNotification("eY6b7Dix7b4:APA91bHgfbb4c6bh3OQDw8OGxnQMl9E8sBZpiyg27SQI097rqDl4295p-e0AEyXYq9p5RMev_GmuAUiJLhZZH4q3_8sukM5ajyP6CpEgBcMNzJBQgFRzLqPItDFPAv5v4MvzBNKVbtvH");

        //return "Ok";

        $tarjeta = Card::where("user_id", $carrera->cliente->user->id)->where("defecto", 1)->first();

        $data["id"]           = $carrera->id;
        $data["minutos"]           = $tiempo_actual->diff($tiempo_inicio)->format('%I:%S');
        $data["estado"]       = $carrera->statuses_id;
        $data["nombre"]       = $carrera->driver->nombres . " " . $carrera->driver->apellidos;
        $data["email"]        = $carrera->driver->user->email;
        $data["dni"]        = $carrera->driver->dni;
        $data["licencia"]        = $carrera->driver->licencia;
        $data["vehiculo"]     = " ";
        $data["placa"]        = " ";
        $data["puntos"]       = 4;
        $data["fotovehiculo"] = " ";
        $data["telefono"]     = $carrera->driver->user->telefono;
        $data["foto"]         = getImgUsuario($carrera->driver->user);
        $data["tarifa"]       = number_format($carrera->price, 2);
        $data["tarjeta"]      = $tarjeta->descripcion . " *" . $tarjeta->tarjeta;

        $data["formaPago"]   = $carrera->paytip_id;
        $data["cupon_id"]   = $carrera->cupon_id;
        $data["distancia"]   = $carrera->distancia;
        $data["tiempo"]   = $carrera->tiempo;
        $data["cupon_monto"]   = $carrera->cupon_monto;
        $data["origen"]      = $carrera->ruta->origen->name;
        $data["destino"]     = $carrera->ruta->destino->name;
        $data["llDestino"]   = $carrera->ruta->destino->address;
        $data["llOrigen"]    = $carrera->ruta->origen->address;
        $data["codigo"]      = $carrera->codigo_auto_gen;
        $data["tipo"]        = 1;
        $data["idCliente"]   = $carrera->clie_id;
        $data["idCliUser"]   = $carrera->cliente->user->id;
        $data["idConductor"] = $carrera->driver->id;
        $data["idCondUser"]  = $carrera->driver->users_id;
        //$jsonOrigen          = $carrera->ruta->origen->address;
        $jsonOrigen        = json_decode($carrera->ruta->origen->address);
        $jsonDestino       = json_decode($carrera->ruta->destino->address);
        $data["latOrigen"] = $jsonOrigen->lat;
        $data["lngOrigen"] = $jsonOrigen->lng;

        $data["latDestino"] = $jsonDestino->lat;
        $data["lngDestino"] = $jsonDestino->lng;
        //$data["lngOrigen"]   = $jsonOrigen["lng"];

        return $data;
    }

    public function cambiarTipoPago($id)
    {
        $carrera = Carrera::find($id);

        if ($carrera) {
            $carrera->paytip_id = 2;
            if ($carrera->save()) {
                return response()->json(array(
                    "codigo"  => 200,
                    "mensaje" => "El tipo de pago ha sido actualizado",
                ));
            }
        }

        return response()->json(array(
            "codigo"  => 500,
            "mensaje" => "Error al actualizar el de pago",
        ));
    }

    public function detalleCarreraTerminada($id)
    {
        $data = array();

        $carrera             = Carrera::find($id);
        $data["id"]          = $carrera->id;
        $data["estado"]      = $carrera->statuses_id;
        $data["tarifa"]      = number_format($carrera->price, 2);
        $data["formaPago"]   = $carrera->paytip_id;
        $data["puntos"]      = $carrera->cliente->gratis->puntos;
        $data["origen"]      = $carrera->ruta->origen->name;
        $data["destino"]     = $carrera->ruta->destino->name;
        $data["llDestino"]   = $carrera->ruta->destino->address;
        $data["llOrigen"]    = $carrera->ruta->origen->address;
        $data["idConductor"] = $carrera->driver->id;

        return $data;
    }

    public function carreraHistorialCliente($id)
    {

        $data = DB::table("tickets")
            ->join('clients', 'tickets.clients_id', '=', 'clients.id')
            ->join("users", "clients.users_id", "=", "users.id")
            ->join("rides", "rides.id", "=", "tickets.rides_id")
            ->join("routes", "routes.id", "=", "rides.routes_id")
            ->join("points", "points.id", "=", "routes.destinations_id")
            ->join("drivers", "drivers.id", "=", "rides.drivers_id")
            ->where("users.id", "=", $id)
            ->orderBy("rides.created_at", "desc")
            ->select("tickets.id",
                "drivers.nombres as nombre",
                "rides.paytip_id as formaPago",
                "points.name as destino",
                DB::raw("FORMAT(rides.price,2) as tarifa"
                ))
            ->get();

        return $data;
    }

    public function carreraHistorialConductor($id)
    {

        $data = DB::table("tickets")
            ->join('clients', 'tickets.clients_id', '=', 'clients.id')
            ->join("users", "clients.users_id", "=", "users.id")
            ->join("rides", "rides.id", "=", "tickets.rides_id")
            ->join("routes", "routes.id", "=", "rides.routes_id")
            ->join("points", "points.id", "=", "routes.destinations_id")
            ->join("drivers", "drivers.id", "=", "rides.drivers_id")
            ->where("drivers.users_id", "=", $id)
            ->orderBy("rides.created_at", "desc")
            ->select("tickets.id",
                "users.name as nombre",
                "rides.paytip_id as formaPago",
                "points.name as destino",
                DB::raw("FORMAT(rides.price,2) as tarifa"
                ))
            ->get();

        return $data;

    }

    public function reporteInicial($id)
    {

        $data = DB::table("tickets")
            ->join('clients', 'tickets.clients_id', '=', 'clients.id')
            ->join("users", "clients.users_id", "=", "users.id")
            ->join("rides", "rides.id", "=", "tickets.rides_id")
            ->join("drivers", "drivers.id", "=", "rides.drivers_id")
            ->where("drivers.users_id", "=", $id)
            ->whereDate('rides.created_at', date("Y-m-d"))
            ->select("tickets.id",
                DB::raw('FORMAT(SUM(rides.price),2) as totalhoy')
            )
            ->get();

        $data2 = DB::table("tickets")
            ->join('clients', 'tickets.clients_id', '=', 'clients.id')
            ->join("users", "clients.users_id", "=", "users.id")
            ->join("rides", "rides.id", "=", "tickets.rides_id")
            ->join("drivers", "drivers.id", "=", "rides.drivers_id")
            ->where("drivers.users_id", "=", $id)
            ->whereDate('rides.created_at', date("Y-m-d"))
            ->select("tickets.id")
            ->count();

        return response()->json(array(
            "total"    => $data[0]->totalhoy == null ? "0.00" : ($data[0]->totalhoy - ($data[0]->totalhoy * 20 / 100)),
            "cantidad" => $data2,
        ));

    }

    public function getRealizarCobro($id)
    {
        $SECRET_KEY = "sk_test_4xsJP4PObjRpOPMr";
        $culqi      = new Culqi(array('api_key' => $SECRET_KEY));

        //return $id;
        $carrera = Carrera::find($id);
        //return $carrera;
        $cliente = $carrera->cliente;
        $tarjeta = Card::where("user_id", $cliente->users_id)->where("defecto", 1)->first();
        $token   = $tarjeta->makeVisible("codigo")->codigo;

        $datosCobro = array(
            "amount"        => $carrera->price * 100,
            "capture"       => true,
            "currency_code" => "PEN",
            "description"   => "Carrera finalizada con el código: #" . $carrera->id,
            "email"         => $carrera->cliente->user->email,
            "metadata"      => array(
                "conductor" => $carrera->driver->nombres . " " . $carrera->driver->apellidos,
                "cliente"   => $carrera->cliente->user->name,
            ),
            "installments"  => 0,
            "source_id"     => $token,
        );

        $charge = $culqi->Charges->create($datosCobro);

        //return json_encode($charge);
    }

}
