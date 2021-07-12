<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$codigo = $_GET['codigo'];
$codigo = mysqli_real_escape_string($con,$codigo);

$sqlSalida = "SELECT *FROM salida WHERE codigo='".$codigo."'";
$querySalida = mysqli_query($con,$sqlSalida);

foreach($querySalida as $rowSalida){}

$sqlAlevinaje = "SELECT *FROM alevinaje WHERE lago='".$rowSalida['viene']."' AND siembra='".$rowSalida['siembra']."'";
$queryAlevinaje = mysqli_query($con,$sqlAlevinaje);

foreach($queryAlevinaje as $rowAlevinaje){}

$saldo = $rowAlevinaje['saldo'] + $rowSalida['cantidad'];

$sqlLevante = "DELETE FROM levante WHERE lago='".$rowSalida['lago']."' AND siembra='".$rowSalida['siembra']."'";
$queryLevante = mysqli_query($con,$sqlLevante);

$sqlSal = "DELETE FROM salida WHERE codigo='".$codigo."'";
$querySal = mysqli_query($con,$sqlSal);

if(mysqli_error()!=null){
    echo mysqli_error($con);
}else{

    //Se toma el codigo del registro de alevinaje que viene de la consulta anterior (rowAlevinaje)
    $sqlAlevino = "UPDATE alevinaje SET saldo='".$saldo."' WHERE codigo='".$rowAlevinaje['codigo']."'";
    $queryAlevino = mysqli_query($con,$sqlAlevino);

    header('LOCATION: ../../views/v_alevinaje/v_listarSalidas.php');
}


?>