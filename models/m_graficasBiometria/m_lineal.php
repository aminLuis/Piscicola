<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$sql = "SELECT *FROM muestreo WHERE lago='".$lago."' AND siembra='".$siembra."' ORDER BY fecha";
$query = mysqli_query($con,$sql);

$ejeX = array(); //Para fechas
$ejeY = array(); //Para conversion
$ganadoY = array(); //Para peso ganado
$biomasa = array(); //Para la biomasa


$anteriorBio = 0;
$anteriorKg = 0;
$pesoGanado = 0;
$conversion = 0;
$i = 0;

foreach($query as $row){

  if($i==0){
      $pesoGanado = 0;
      $conversion = 0;
      $ejeY[] = $conversion;
      $ganadoY[] = $pesoGanado;
  }else{

    $pesoGanado = $row['biomasa'] - $anteriorBio;
    $conversion = $anteriorKg / $pesoGanado;
    $ejeY[] = $conversion;
    $ganadoY[] = $pesoGanado;
  }

    $anteriorBio = $row['biomasa'];
    $anteriorKg = $row['kilosDia'];
    $ejeX[] = $row['fecha'];
    $biomasa[] = $row['biomasa'];
   
    $i++;
}

$datosX = json_encode($ejeX);
$datosY = json_encode($ejeY);
$kgGanado = json_encode($ganadoY);
$jsonBiomasa = json_encode($biomasa);

if(mysqli_error($con)!=null){
    echo mysqli_error($con);
    die();
}

$con -> close();

?>


