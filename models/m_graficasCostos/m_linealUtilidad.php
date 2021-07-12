<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$sqlCostos = "SELECT *FROM costosTotales";
$queryCostos = mysqli_query($con,$sqlCostos);

$sqlRecaudo = "SELECT *FROM levante";
$queryRecaudo = mysqli_query($con,$sqlRecaudo);

$sqlSiembra = "SELECT *FROM siembra";
$querySiembra = mysqli_query($con,$sqlSiembra);

$utilidad = array(); 
$siembra = array();

foreach($querySiembra as $siembras){
    $siembra[] = $siembras['siembra'];
}


$tam = count($siembra);

for($i=0;$i<$tam;$i++){

    $costos = 0;
    $recaudo = 0;
  
    

     foreach($queryCostos as $rwCostos){
         if($siembra[$i]==$rwCostos['siembra']){
              $costos = $costos + $rwCostos['total'];          
         }
     }

     foreach($queryRecaudo as $rwRecaudo){
         if($siembra[$i]==$rwRecaudo['siembra']){
             $recaudo = $recaudo + ($rwRecaudo['kilogramos']*$rwRecaudo['precio']);
         }
     }

     $utilidad[] = $recaudo - $costos;

}

$jsonUtilidad = json_encode($utilidad);
$jsonSiembra = json_encode($siembra);

$con->close();

?>