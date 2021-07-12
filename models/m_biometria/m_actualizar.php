<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['lago']) && $_POST['lago']!="" &&
   isset($_POST['animal']) && $_POST['animal']!="" &&
   isset($_POST['siembra']) && $_POST['siembra']!="" &&
   isset($_POST['promedio']) && $_POST['promedio']!="" &&
   isset($_POST['cantidad']) && $_POST['cantidad']!="" &&
   isset($_POST['porcentaje']) && $_POST['porcentaje']!="" &&
   isset($_POST['ajuste']) && $_POST['ajuste']!="" &&
   isset($_POST['alimento']) && $_POST['alimento']!="" &&
   isset($_POST['fecha']) && $_POST['fecha']!=""

){

$lago = $_POST['lago'];
$animal = $_POST['animal'];
$siembra = $_POST['siembra'];
$promedio = $_POST['promedio'];
$cantidad = $_POST['cantidad'];
$porcentaje = $_POST['porcentaje'];
$ajuste = $_POST['ajuste'];
$alimento = $_POST['alimento'];
$fecha = $_POST['fecha'];

$biomasa = ($promedio*$cantidad)/1000;
$kilos = ($promedio*$cantidad*($porcentaje/100))/1000;

$codigo = $_GET['codigo'];

$lago = mysqli_real_escape_string($con,$lago);
 $animal = mysqli_real_escape_string($con,$animal);
 $siembra = mysqli_real_escape_string($con,$siembra);
 $promedio = mysqli_real_escape_string($con,$promedio);
 $cantidad = mysqli_real_escape_string($con,$cantidad);
 $porcentaje = mysqli_real_escape_string($con,$porcentaje);
 $ajuste = mysqli_real_escape_string($con,$ajuste);
 $alimento = mysqli_real_escape_string($con,$alimento);
 $fecha = mysqli_real_escape_string($con,$fecha);


$sql = "UPDATE muestreo SET
lago = '".$lago."',
animal = '".$animal."',
siembra = '".$siembra."',
promedio = '".$promedio."',
cantidad = '".$cantidad."',
porcentaje = '".$porcentaje."',
ajuste = '".$ajuste."',
alimento = '".$alimento."',
biomasa = '".$biomasa."',
kilosDia = '".$kilos."',
fecha = '".$fecha."'
WHERE codigo = '".$codigo."'
";


$query = mysqli_query($con,$sql);

header('LOCATION: ../../views/v_biometria/v_muestreo.php');

}

?>