<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$sql = "SELECT *FROM costosTotales WHERE siembra='".$siembra."'";
$query = mysqli_query($con,$sql);

$costSiembra = 0;

foreach($query as $row){

    $costSiembra = $costSiembra + $row['total'];
}

$sqlLevante = "SELECT *FROM levante WHERE siembra='".$siembra."'";
$queryLevante = mysqli_query($con,$sqlLevante);

$recaudo = 0;

foreach($queryLevante as $rowLevante){
   $recaudo = $recaudo + ($rowLevante['kilogramos']*$rowLevante['precio']);
}

$utilidad = $recaudo - $costSiembra;

?>