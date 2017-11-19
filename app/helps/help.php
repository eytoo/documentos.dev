<?php
require_once 'Requests/library/Requests.php';
Requests::register_autoloader();
include 'culqi/lib/culqi.php';

use App\Comentario;
use Carbon\Carbon;

/**
 * Obtiene una instancia de la empresa
 *
 * @return mixed
 */
function emp()
{
    return App\Empresa::find(1);
}

/**
 * @return \Illuminate\Support\Collection
 */
function prod()
{
    return collect();
}

/**
 * Obtiene un numero en formato moneda
 *
 * @param int $monto
 * @param int $dec
 * @return string
 */
function getMoneda($monto, $dec = 2)
{
    return "$" . number_format($monto, $dec);
}

/**
 * Formatea el monto para mostrar en frontend
 *
 * @param int $monto
 * @return string
 */
function formatMon($monto)
{
    $moneda_def = "USD";
    switch ($moneda_def) {
        case 'PEN':
            return "<strong>S/</strong> " . number_format($monto, 0);
            break;
        default:
            return "$" . number_format($monto, 0);
            break;
    }
}

/**
 * Obtiene la url de las imagenes para usuarios
 *
 * @param int $monto
 * @return string
 */
function getImgUsuario($user)
{
    if (strpos($user->user_foto, 'facebook.com') !== false) {
        return $user->user_foto;
    }

    if (strpos($user->user_foto, 'googleusercontent.com') !== false) {
        return $user->user_foto;
    }

    if (is_null($user->user_foto)) {
        return url("imagenes/imagenes/perfil/icono-perfilusuario-01.png");
    }

    return url('imagenes/' . $user->user_foto);

}

/**
 * Obtiene el estado de la entidad
 *
 * @param $codigo
 * @return string
 */
function getEstado($codigo)
{
    switch ($codigo) {
        case 0:
            return "Inactivo";
            break;
        case 1:
            return "Activo";
            break;
        default:
            return "- Sin especificar -";
            break;
    }
}

function getCertificado($codigo)
{
    switch ($codigo) {
        case 0:
            return "No";
            break;
        case 1:
            return "Si";
            break;
        default:
            return "- Sin especificar -";
            break;
    }
}

function getGratuito($codigo)
{
    switch ($codigo) {
        case 0:
            return "No";
            break;
        case 1:
            return "Si";
            break;
        default:
            return "- Sin especificar -";
            break;
    }
}

function getTipo($codigo)
{
    switch ($codigo) {
        case "SU":
            return "Suscripción";
            break;
        case "PU":
            return "Pago único";
            break;
        default:
            return "- Sin especificar -";
            break;
    }
}

function getTipoLeccion($codigo)
{
    switch ($codigo) {
        case "G":
            return "Gratis";
            break;
        case "P":
            return "Premium";
            break;
        default:
            return "- Sin especificar -";
            break;
    }
}

/**
 * Obtiene las iniciales de los meses del año
 *
 * @param date $fecha
 * @return string
 */
function getIniMes($fecha)
{
    $nmes = date("n", strtotime($fecha));
    switch ($nmes) {
        case 1:
            return "Ene";
            break;
        case 2:
            return "Feb";
            break;
        case 3:
            return "Mar";
            break;
        case 4:
            return "Abr";
            break;
        case 5:
            return "May";
            break;
        case 6:
            return "Jun";
            break;
        case 7:
            return "Jul";
            break;
        case 8:
            return "Ago";
            break;
        case 9:
            return "Set";
            break;
        case 10:
            return "Oct";
            break;
        case 11:
            return "Nov";
            break;
        case 12:
            return "Dic";
            break;
        default:
            return "Sin";
            break;
    }
}

/**
 * Obtiene la ruta del servidor
 *
 * @return string
 */
function getRG()
{
    return "/home/dacdevs/public_html/acopio/";
}

/**
 * Obtiene la ruta de un archivo de backup
 *
 * @param $file
 * @return string
 */
function getFilePath($file)
{
    return getRG() . 'storage/app/http---localhost/' . $file;
}

/**
 * Retorna las cantidad de lecciones que tiene un curso
 * @param  object   $curso  objeto curso
 * @return integer          cantidad de lecciones
 */
function cantLecciones($curso)
{
    $lecciones = DB::table('lecciones')
        ->join('temas', 'temas.tema_id', '=', 'lecciones.tema_id')
        ->join('cursos', 'cursos.cur_id', '=', 'temas.cur_id')
        ->where("cursos.cur_id", "=", $curso->cur_id)
        ->select('lecciones.lec_id')
        ->count();
    return $lecciones;
}

/**
 * Retorna las estrellas segun la cantidad que se le ingrese
 * @param  integer $cantidad cantidad de estrellas a retornar
 * @return string           retorna las estrellas en string
 */
function getEstrellas($cantidad)
{
    $estrella      = '<i class="fa fa-star" aria-hidden="true"></i>';
    $estrellaVacia = '<i class="fa fa-star-o" aria-hidden="true"></i>';
    $resultado     = "";
    for ($i = 0; $i < 5; $i++) {
        if ($i < $cantidad) {
            $resultado .= $estrella;
        } else {
            $resultado .= $estrellaVacia;
        }
    }
    return $resultado;
}

function getFechaDif($fecha)
{
    Carbon::setLocale('es');
    $dt = Carbon::parse($fecha);
    return $dt->diffForHumans(Carbon::now());
}

function hasComChild($comentario)
{
    $comChildCount = Comentario::where("com_parent_id", $comentario->com_id)->count();
    return $comChildCount;
}


function sendNotificationChofer($token,$titulo,$mensaje,$data,$nivel = "normal"){
    #API access key from Google API's Console
    $key = 'AAAAaIqhmBw:APA91bEGjgY4FA7FGKkGpWkbIE1A2YEhLLw3GGxuRkhnB6GbRtWUEj9ZajzO58FFispoudkjS9bjhWOn6vgM3yJLw_uLu7JucdTGQp31Y_f1h-1xN682jA2HK2-Zkz1aCvdMAJLPMCST';
    $registrationIds = $token;
    
    #prep the bundle
     $msg = array
          (
            'body'  => $mensaje,
            'title' => $titulo,
            'icon'  => 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
          );

    $fields = array(
                      'to'        => $registrationIds,
                      "priority" => $nivel,
                      'notification'  => $msg,
                      'data' => $data
                    );
    
    $headers = array
    (
        'Authorization: key=' . $key,
        'Content-Type: application/json'
    );

    #Send Reponse To FireBase Server    
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result = curl_exec($ch);
    curl_close( $ch );
    #Echo Result Of FireBase Server
    //echo $result;
}

function sendNotification($token,$titulo,$mensaje,$data,$nivel = "normal"){
    #API access key from Google API's Console
    $key = 'AAAAhQfeUlw:APA91bGPuGybL6sUHE4hAWwyhqZnIfpyraSdX4gQbri3eNEBRSNbUHFNCppPBW8ZLgiOPMwM6NhI4yUsi_c0d7Vv4QHfnqz7--9qKCFutVYrgToVPwK2Dx6tS0VDRKFWiXz3E08wztuB';
    $registrationIds = $token;
    
    #prep the bundle
     $msg = array
          (
            'body'  => $mensaje,
            'title' => $titulo,
            'icon'  => 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
          );

    $fields = array(
                      'to'        => $registrationIds,
                      "priority" => $nivel,
                      'notification'  => $msg,
                      'data' => $data
                    );
    
    $headers = array
    (
        'Authorization: key=' . $key,
        'Content-Type: application/json'
    );

    #Send Reponse To FireBase Server    
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result = curl_exec($ch);
    curl_close( $ch );
    #Echo Result Of FireBase Server
    //echo $result;
}
