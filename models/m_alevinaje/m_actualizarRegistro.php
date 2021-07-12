<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$cantidad = $_POST['cantidad'];
$siembra = $_POST['siembra'];
$lagoAlevinaje = $_POST['lago'];
$lagoEngorde = $_POST['lagoEngorde'];

$sqlAlevinaje = "SELECT *FROM alevinaje WHERE lago='".$lagoAlevinaje."' AND siembra='".$siembra."'";
$queryAlevinaje = mysqli_query($con,$sqlAlevinaje);

foreach($queryAlevinaje as $rowAlevinaje){}

$sqlRegistro = "SELECT *FROM registroSalida WHERE codigo='".$rowAlevinaje['codigo']."'";
$queryRegistro = mysqli_query($con,$sqlRegistro);

foreach($queryRegistro as $rowRegistro){}


$sqlSalida = "SELECT *FROM salida WHERE lago='".$lagoEngorde."' AND siembra='".$siembra."'";
$querySalida = mysqli_query($con,$sqlSalida);

foreach($querySalida as $rowSalida){}

$saldoInicial = $rowAlevinaje['saldo'] + $rowRegistro['cantidad'];

if($saldoInicial<$cantidad){
  echo 'La cantidad a retirar del lago es mayor a la disponible';
}else{


  $saldoInicialSalida = $rowSalida['saldo'] - $rowRegistro['cantidad'];
  $cantidadInicial = $rowSalida['cantidad'] - $rowRegistro['cantidad'];
  
  $nuevaAdicionSalida = $saldoInicialSalida + $cantidad;
  $nuevaAdicionEntraron = $cantidadInicial + $cantidad;

  //Se actualiza el saldo y entrada en la tabla salida
  $sqlUpdateSalida = "UPDATE salida SET cantidad='".$nuevaAdicionEntraron."', saldo='".$nuevaAdicionSalida."' WHERE codigo='".$rowSalida['codigo']."'";
  $queryUpdateSalida = mysqli_query($con,$sqlUpdateSalida); 

  $diferencia = $saldoInicial - $cantidad;

  //Se actualiza el saldo en el lago de alevinaje
  $sqlUpdateAlevinaje = "UPDATE alevinaje SET saldo='".$diferencia."' WHERE codigo='".$rowAlevinaje['codigo']."'";
  $queyUpdateAlevinaje = mysqli_query($con,$sqlUpdateAlevinaje);

  //Se actualiza la cantidad en la tabla de registros de salidas
  $sqlUpdateRegistro = "UPDATE registroSalida SET cantidad='".$cantidad."' WHERE codigo='".$rowAlevinaje['codigo']."'";
  $queryUpdateRegistro = mysqli_query($con,$sqlUpdateRegistro);


  header('LOCATION: ../../views/v_alevinaje/v_listarSalidas.php');

}


?>