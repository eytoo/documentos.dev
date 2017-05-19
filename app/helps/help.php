<?php

/**
 * Obtiene una instancia de la empresa
 *
 * @return mixed
 */
function emp(){
    return App\Empresa::find(1);
}

/**
 * @return \Illuminate\Support\Collection
 */
function prod(){
    return collect();
}

/**
 * Obtiene un numero en formato moneda
 *
 * @param int $monto
 * @param int $dec
 * @return string
 */
function getMoneda($monto, $dec = 2){
	return "$ ". number_format($monto,$dec);
}

/**
 * Obtiene el estado de la entidad
 *
 * @param $codigo
 * @return string
 */
function getEstado($codigo){
    switch ($codigo){
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

function getCertificado($codigo){
    switch ($codigo){
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

function getGratuito($codigo){
    switch ($codigo){
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

function getTipo($codigo){
    switch ($codigo){
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

function getTipoLeccion($codigo){
    switch ($codigo){
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
function getFilePath($file){
    return getRG().'storage/app/http---localhost/'.$file;
}