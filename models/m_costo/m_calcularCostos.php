<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$sqlSiembra = "SELECT *FROM siembra WHERE siembra='".$siembra."'";
$querySiembra = mysqli_query($con,$sqlSiembra);

foreach($querySiembra as $rowSiembra){}

$sqlCostosFijos = "SELECT *FROM costosFijos WHERE siembra='".$siembra."'";
$queryCostosFijos= mysqli_query($con,$sqlCostosFijos);

foreach($queryCostosFijos as $rowCostosFijos){}

$sqlLago = "SELECT *FROM lago WHERE lag='".$la."'";
$queryLago = mysqli_query($con,$sqlLago);

foreach($queryLago as $rowLago){}

if($rowLago['area']==0){
header('LOCATION: ../../views/v_costos/v_validacionAreaLago.php');
}else{

    $sqlConsumo = "SELECT *FROM consumo WHERE lago='".$la."' AND siembra='".$siembra."'";
    $queryConsumo = mysqli_query($con,$sqlConsumo);

   $total = 0;

    foreach($queryConsumo as $rowConsumo){
        $total = $total + ($rowConsumo['kilos']*($rowConsumo['precio']+$rowConsumo['flete']));
    }

 
    if($rowCostosFijos['codigo']==null){
        //echo 'La siembra no se le han fijado los costos';
        header('LOCATION: ../../views/v_admin/v_validarCostosSiembra.php');
    }else{

        $areaLago = 0;
        $areaLago = $rowLago['area'] / $rowSiembra['area'];


    $energia = 0;
    $personalFijo = 0;
    $asistencia = 0;
    $jornales = 0;
    $combustible = 0;
    $tiros = 0;

    $energia = $rowCostosFijos['energia'] * $areaLago ;
    $personalFijo = $rowCostosFijos['nomina'] * $areaLago;
    $asistencia = $rowCostosFijos['asistencia'] * $areaLago;
    $jornales = $rowCostosFijos['jornales'] * $areaLago;
    $combustible = $rowCostosFijos['combustible'] * $areaLago;
    $tiros = $rowCostosFijos['tiros'] * $areaLago;
    }

    
}

//$con -> close();

?>