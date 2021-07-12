<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
require('../../models/m_costos/m_datosSiembra.php');
require('../../models/m_costos/m_datosCostosFijos.php');

$sq = "SELECT *FROM lago WHERE lag='".$la."'";
$qr = mysqli_query($con,$sq);



foreach($qr as $rw){}

if($rw['area']==null){

   echo 'El lago ingresado aún no se le ha registrado el area'; 
   header('LOCATION: ../../views/v_costos/v_validacionAreaLago.php');

}else{

  $sql = "SELECT *FROM consumo WHERE lago='".$la."' AND siembra='".$siembra."'";
  $query = mysqli_query($con,$sql);

  $total = 0;

  foreach($query as $row){
    $total = $total + ($row['kilos']*($row['precio']+$row['flete']));
   
  }

  $lagoArea = $rw['area']/$r['area'];
  
  $energia = $costos['energia'] * $lagoArea * 5;
  $personalFijo = $costos['nomina'] * $lagoArea * 5;
  $asistencia = $costos['asistencia'] * $lagoArea * 5;
  $jornales = $costos['jornales'] * $lagoArea * 5;
  $combustible = $costos['combustible'] * $lagoArea * 5;
  $tiros = $costos['tiros'] * $lagoArea * 5;

}





?>