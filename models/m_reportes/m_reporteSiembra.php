<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$sqlAlevinaje = "SELECT *FROM alevinaje WHERE siembra='".$siembra."'";
$queryAlevinaje = mysqli_query($con,$sqlAlevinaje);

$sqlSalida = "SELECT *FROM salida WHERE siembra='".$siembra."'";
$querySalida = mysqli_query($con,$sqlSalida);

$sqlConsumo = "SELECT *FROM consumo WHERE siembra='".$siembra."'";
$queryConsumo = mysqli_query($con,$sqlConsumo);

$sqlLevante = "SELECT *FROM levante WHERE siembra='".$siembra."'";
$queryLevante = mysqli_query($con,$sqlLevante);

$sqlCostosTotales = "SELECT *FROM costosTotales WHERE siembra='".$siembra."'";
$queryCostosTotales = mysqli_query($con,$sqlCostosTotales);

$totalConsumoAlevinaje = 0;
$totalConsumoLevante = 0;

foreach($queryAlevinaje as $rowAlevinaje){
    foreach($queryConsumo as $rowConsumo){
       if($rowAlevinaje['lago']==$rowConsumo['lago']){
           $totalConsumoAlevinaje = $totalConsumoAlevinaje + $rowConsumo['kilos'];
       }
    }
}

foreach($querySalida as $rowSalida){
     foreach($queryConsumo as $rowConsumo){
         if($rowSalida['lago']==$rowConsumo['lago']){
             $totalConsumoLevante = $totalConsumoLevante + $rowConsumo['kilos'];
         }
     }
}

$totalConsumo = 0;
$totalConsumo = $totalConsumoAlevinaje + $totalConsumoLevante;
$totalKilosCarne = 0;

$totalCostoSiembra = 0;
foreach($queryCostosTotales as $rowCostoSiembra){
    $totalCostoSiembra = $totalCostoSiembra + $rowCostoSiembra['total'];
}

$totalRecaudoSiembra = 0;
foreach($queryLevante as $rowLevante){
    $totalRecaudoSiembra = $totalRecaudoSiembra + ($rowLevante['kilogramos'] *$rowLevante['precio'] );
    $totalKilosCarne = $totalKilosCarne + $rowLevante['kilogramos'];
}

$utilidadSiembra = 0;
$utilidadSiembra = $totalRecaudoSiembra - $totalCostoSiembra;


?>