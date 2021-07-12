<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$lago = mysqli_real_escape_string($con,$lago);

$sql = "SELECT *FROM costosTotales WHERE lago='".$lago."'";
$query = mysqli_query($con,$sql);

$costos = array();
$siembra = array();

foreach($query as $row){
    $costos[] = $row['total'];
    $siembra[] = $row['siembra'];
}

$jsonCostos = json_encode($costos);
$jsonSiembra = json_encode($siembra);

$con -> close();

?>