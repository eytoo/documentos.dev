<?php
use Carbon\Carbon;
use App\Comentario;

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
            return "<strong>S/</strong> " . $monto;
            break;
        default:
            return "$" . $monto;
            break;
    }
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
function getEstrellas($cantidad){
  $estrella = '<i class="fa fa-star" aria-hidden="true"></i>';
  $estrellaVacia = '<i class="fa fa-star-o" aria-hidden="true"></i>';
  $resultado = "";
  for ($i=0; $i < 5; $i++) {
    if($i < $cantidad){
      $resultado .= $estrella;
    }else{
      $resultado .= $estrellaVacia;
    }
  }
  return $resultado;
}

function getFechaDif($fecha){
  Carbon::setLocale('es');
  $dt = Carbon::parse($fecha);
  return $dt->diffForHumans(Carbon::now());
}

function hasComChild($comentario){
  $comChildCount = Comentario::where("com_parent_id",$comentario->com_id)->count();
  return $comChildCount;
}
