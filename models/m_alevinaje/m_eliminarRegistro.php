<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$codigoInterno = $_GET['codigoInterno'];
$codigoInterno = mysqli_real_escape_string($con,$codigoInterno);

$sqlRegistroSalida = "SELECT *FROM registroSalida WHERE codigoInterno='".$codigoInterno."'";
$queryRegistroSalida = mysqli_query($con,$sqlRegistroSalida);

foreach($queryRegistroSalida as $rowRegistroSalida){}

$codigoRegistroSalida = $rowRegistroSalida['codigo'];

$sqlAlevinaje = "SELECT *FROM alevinaje WHERE codigo = '".$codigoRegistroSalida."'";
$queryAlevinaje = mysqli_query($con,$sqlAlevinaje);

foreach($queryAlevinaje as $rowAlevinaje){}

$sqlSalida = "SELECT *FROM salida WHERE lago='".$rowRegistroSalida['lagoEngorde']."' AND siembra='".$rowRegistroSalida['siembra']."'";
$querySalida = mysqli_query($con,$sqlSalida);

foreach($querySalida as $rowSalida){}

$cantidadAlevinoInicial = $rowAlevinaje['saldo'] + $rowRegistroSalida['cantidad'];
$restaSaldoSalida = $rowSalida['saldo'] - $rowRegistroSalida['cantidad'];
$restaCantidadSalida = $rowSalida['cantidad'] - $rowRegistroSalida['cantidad'];

$sqlUpdateAlevinaje = "UPDATE alevinaje SET saldo='".$cantidadAlevinoInicial."' WHERE codigo='".$codigoRegistroSalida."'";
$queryUpdateAlevinaje = mysqli_query($con,$sqlUpdateAlevinaje);

$sqlUpdateSalida = "UPDATE salida SET cantidad='".$restaCantidadSalida."', saldo='".$restaSaldoSalida."' WHERE codigo='".$rowSalida['codigo']."'";
$queryUpdateSalida = mysqli_query($con,$sqlUpdateSalida);

$sqlEliminarResgistro = "DELETE FROM registroSalida WHERE codigoInterno='".$codigoInterno."'";
$queryEliminarRegistro = mysqli_query($con,$sqlEliminarResgistro);

$sqlValidar = "SELECT *FROM salida WHERE codigo='".$rowSalida['codigo']."'";
$queryValidar = mysqli_query($con,$sqlValidar);

foreach($queryValidar as $rowValidar){}

if($rowValidar['cantidad']==0){
    $sqlEliminarSalida = "DELETE FROM salida WHERE codigo='".$rowSalida['codigo']."'";
    $queryEliminarSalida = mysqli_query($con,$sqlEliminarSalida);

    $sqlEliminarLevantes = "DELETE FROM levante WHERE lago='".$rowSalida['lago']."' AND siembra='".$rowSalida['siembra']."'";
    $queryEliminarLevantes = mysqli_query($con,$sqlEliminarLevantes);

    header('LOCATION: ../../views/v_alevinaje/v_listarSalidas.php');
    //Falta redirigir página, cambiar el card-header en la vista de eliminar y por último hay que probar
}else{
    header('LOCATION: ../../views/v_alevinaje/v_listarSalidas.php');
}




?>