<?php
/*
Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/

$fecha = date("D/M/Y");
$mes = date("M");

switch($mes){
    case "Jan":
    case "Feb":
    case "Mar":
        $estacion ="Es verano";
        break;
    case "Apr":
    case "May":
    case "Jun":
        $estacion = "Es otoño";
        break;
    case "Jul":
    case "Aug":
    case "Sep":
        $estacion = "Es invierno";
        break;
    case "Oct":
    case "Nov":
    case "Dec":
        $estacion = "Es primavera";
        break;
}
print("$fecha por lo tanto $estacion");
?>