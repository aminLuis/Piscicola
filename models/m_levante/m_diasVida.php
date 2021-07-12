<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$codLevante = $_GET['codigo'];
$lago = $_GET['lago'];
$siembra = $_GET['siembra'];

$codLevante = mysqli_real_escape_string($con,$codLevante);
$lago = mysqli_real_escape_string($con,$lago);
$siembra = mysqli_real_escape_string($con,$siembra);

//Busca lago y siembra de levante en 'salida' del cual se hizo la pezca para así
//obtener el lago de alevinaje de dónde viene el saldo que está en salida
$sqlSalida = "SELECT *FROM salida WHERE lago='".$lago."' AND siembra='".$siembra."'";
$querySalida = mysqli_query($con,$sqlSalida);
foreach($querySalida as $rowSalida){}
//

$viene = $rowSalida['viene']; //Lago de alevinaje

//NOTA: Los lagos aquí están en la misma siembra

//Se obtienen todos los datos del lago de alevinaje, lo que interesa es la fecha
//para calcular los dias de vida
$sqlAlevinaje = "SELECT *FROM alevinaje WHERE lago='".$viene."' AND siembra='".$siembra."'";
$queryAlevinaje = mysqli_query($con,$sqlAlevinaje);
foreach($queryAlevinaje as $rowAlevinaje){}
$fechaAlevinaje = $rowAlevinaje['fecha'];

//Se obtienen los datos del levante para obteber así la fecha en que se 
//hizo la pezca
$sqlLevante = "SELECT *FROM levante WHERE codigo='".$codLevante."'";
$queryLevante = mysqli_query($con,$sqlLevante);
foreach($queryLevante as $rowLevante){}
$fechaLevante = $rowLevante['fecha'];

//Se calcula los dias transcurridos a partir de las dos fechas

$timeInicio = date_create($fechaAlevinaje);
$timeFinal = date_create($fechaLevante);

$time = date_diff($timeInicio,$timeFinal);
$dias = array();

foreach($time as $rw){
    $dias[] = $rw;
}

$totalDias = $dias[11];

?>