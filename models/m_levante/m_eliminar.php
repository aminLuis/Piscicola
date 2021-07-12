<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$codigo = $_GET['codigo'];
$codigo = mysqli_real_escape_string($con,$codigo);

$sqlLevanye = "SELECT *FROM levante WHERE codigo='".$codigo."'";
$queryLevante = mysqli_query($con,$sqlLevanye);
foreach($queryLevante as $rowLevante){}

$unidades = $rowLevante['unidades'];
$lago = $rowLevante['lago'];
$siembra = $rowLevante['siembra'];


$sql = "DELETE FROM levante WHERE codigo='".$codigo."'";
$query = mysqli_query($con,$sql);

if(mysqli_error($con)!=null){
    echo mysqli_error($con);
}else{

    $sqlSalida = "SELECT *FROM salida WHERE lago='".$lago."' AND siembra='".$siembra."'";
    $querySalida = mysqli_query($con,$sqlSalida);
    foreach($querySalida as $rowSalida){}

    $suma = $rowSalida['saldo'] + $unidades;

    $sqlSal = "UPDATE salida SET saldo='".$suma."' WHERE lago='".$lago."' AND siembra='".$siembra."'";
    $querySal = mysqli_query($con,$sqlSal);

    header('LOCATION: ../../views/v_levante/v_guardar.php');

}


$con -> close();

?>