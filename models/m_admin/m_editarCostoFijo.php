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


$codigo = $_GET['codigo'];

$siembra = $_POST['siembra'];
$nomina = $_POST['nomina'];
$asistencia = $_POST['asistencia'];
$jornales = $_POST['jornales'];
$combustible = $_POST['combustible'];
$tiros = $_POST['tiros'];
$energia = $_POST['energia'];
$fecha = $_POST['fecha'];

$codigo = mysqli_real_escape_string($con,$codigo);
$siembra = mysqli_real_escape_string($con,$siembra);
$nomina = mysqli_real_escape_string($con,$nomina);
$asistencia = mysqli_real_escape_string($con,$asistencia);
$jornales = mysqli_real_escape_string($con,$jornales);
$combustible = mysqli_real_escape_string($con,$combustible);
$tiros = mysqli_real_escape_string($con,$tiros);
$energia = mysqli_real_escape_string($con,$energia);
$fecha = mysqli_real_escape_string($con,$fecha);



$sql = "UPDATE costosFijos SET
siembra='".$siembra."',
nomina='".$nomina."',
asistencia='".$asistencia."',
jornales='".$jornales."',
combustible='".$combustible."',
tiros='".$tiros."',
energia='".$energia."',
fecha='".$fecha."'
WHERE codigo='".$codigo."'
";

$query = mysqli_query($con,$sql);
header('LOCATION: ../../views/v_admin/v_costoSiembra.php');


}

?>