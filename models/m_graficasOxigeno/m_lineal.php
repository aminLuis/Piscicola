<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$lago = mysqli_real_escape_string($con,$lago);
$siembra = mysqli_real_escape_string($con,$siembra);

$sql = "SELECT *FROM oxigenacion WHERE lago='".$lago."' AND siembra='".$siembra."' ORDER BY fecha";
$query = mysqli_query($con,$sql);

if(mysqli_error($con)){
    echo mysqli_error($con);
}else{

$fecha = array(); // Para fechas
$OD = array(); // Para valores OD
$temp = array(); // Para valores de temperatura


foreach($query as $row){

    $fecha[] = $row['fecha'];
    $OD[] = $row['oxigeno'];
    $temp[] = $row['temperatura'];
}

$jsonFecha = json_encode($fecha);
$jsonOD = json_encode($OD);
$jsonTemp = json_encode($temp);

}

$con -> close();

?>