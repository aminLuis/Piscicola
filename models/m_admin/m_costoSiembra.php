<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');


if( isset($_POST['siembra']) && $_POST['siembra']!="" &&
    isset($_POST['nomina']) && $_POST['nomina']!="" &&
    isset($_POST['asistencia']) && $_POST['asistencia']!="" &&
    isset($_POST['jornales']) && $_POST['jornales']!="" &&
    isset($_POST['combustible']) && $_POST['combustible']!="" &&
    isset($_POST['tiros']) && $_POST['tiros']!="" &&
    isset($_POST['energia']) && $_POST['energia']!="" &&
    isset($_POST['fecha']) && $_POST['fecha']!=""
){


$consulta = "SELECT *FROM costosFijos";
$qr = mysqli_query($con,$consulta);

$i = 0;
$siembra = $_POST['siembra'];
$siembra = mysqli_real_escape_string($con,$siembra);
$cont = 0;
foreach($qr as $rw){
   $i++;
   if($siembra==$rw['siembra']){
      $cont++;
   }
}


if($i>=1 && $cont>0){
header('LOCATION: ../../views/v_admin/v_validacionCostosFijos.php');
}else{


$nomina = $_POST['nomina'];
$asistencia = $_POST['asistencia'];
$jornales = $_POST['jornales'];
$combustible = $_POST['combustible'];
$tiros = $_POST['tiros'];
$energia = $_POST['energia'];
$fecha = $_POST['fecha'];

$nomina = mysqli_real_escape_string($con,$nomina);
$asistencia = mysqli_real_escape_string($con,$asistencia);
$jornales = mysqli_real_escape_string($con,$jornales);
$combustible = mysqli_real_escape_string($con,$combustible);
$tiros = mysqli_real_escape_string($con,$tiros);
$energia = mysqli_real_escape_string($con,$energia);
$fecha = mysqli_real_escape_string($con,$fecha);

$sql = "INSERT INTO costosFijos(
    siembra,
    nomina,
    asistencia,
    jornales,
    combustible,
    tiros,
    energia,
    fecha
) VALUES(
   '$siembra',
   '$nomina',
   '$asistencia',
   '$jornales',
   '$combustible',
   '$tiros',
   '$energia',
   '$fecha'
)";

 $query = mysqli_query($con,$sql);
 header('LOCATION: ../../views/v_admin/v_costoSiembra.php');
}


}else{
   echo 'Hay campos vacios o campos no definidos';
}

?>