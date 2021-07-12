<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$lago = mysqli_real_escape_string($con,$lago);
$siembra = mysqli_real_escape_string($con,$siembra);

$sqlLevante = "SELECT *FROM levante WHERE lago='".$lago."' AND siembra='".$siembra."'";
$queryLevante = mysqli_query($con,$sqlLevante);

$recaudo = 0;

foreach($queryLevante as $rowLevante){
    $recaudo = $recaudo + ($rowLevante['precio'] * $rowLevante['kilogramos']);
}

$sqlCostos = "SELECT *FROM costosTotales WHERE lago='".$lago."' AND siembra='".$siembra."'";
$queryCostos = mysqli_query($con,$sqlCostos);

foreach($queryCostos as $rowCostos){}

$costos = $rowCostos['total'];
if($rowCostos['total']==null){
    $costos = 0;
}

$utilidad = $recaudo - $costos;

?>