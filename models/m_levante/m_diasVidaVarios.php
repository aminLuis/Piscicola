<?php
require('../../models/m_usuario/m_sesion.php');
//require('../../config/connect.php');
$codLevante = $_GET['codigo'];
$lago = $_GET['lago'];
$siembra = $_GET['siembra'];

$codLevante = mysqli_real_escape_string($con,$codLevante);
$lago = mysqli_real_escape_string($con,$lago);
$siembra = mysqli_real_escape_string($con,$siembra);

$sqlRegistroSalida = "SELECT *FROM registroSalida WHERE siembra='".$siembra."' AND lagoEngorde='".$lago."' ORDER BY fecha";
$queryRegistroSalida = mysqli_query($con,$sqlRegistroSalida);

$sqlLevante = "SELECT *FROM levante WHERE codigo='".$codLevante."'";
$queryLevante = mysqli_query($con,$sqlLevante);

foreach($queryLevante as $rowLevante){}
$fechaLevante = $rowLevante['fecha'];

$dates = array();


foreach($queryRegistroSalida as $rowRegistroSalida){

    $inicio = date_create($rowRegistroSalida['fecha']);
    $final = date_create($fechaLevante);

    $tim = date_diff($inicio,$final);

    $d = array();
        foreach($tim as $r){
            $d[] = $r;
        }
    
    $total = $d[11];
    $dates[] = $d[11];;

}

?>