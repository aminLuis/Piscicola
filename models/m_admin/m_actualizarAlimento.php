<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if( isset($_POST['tipo']) && $_POST['tipo']!="" &&
    isset($_POST['kilos']) && $_POST['kilos']!="" &&
    isset($_POST['precio']) && $_POST['precio']!="" &&
    isset($_POST['flete']) && $_POST['flete']!="" &&
    isset($_POST['fecha']) && $_POST['fecha']!=""
){


$tipo = $_POST['tipo'];
$kilos = $_POST['kilos'];
$precio = $_POST['precio'];
$flete = $_POST['flete'];
$fecha = $_POST['fecha'];

$codigo = $_GET['codigo'];

$codigo = mysqli_real_escape_string($con,$codigo);
$tipo = mysqli_real_escape_string($con,$tipo);
$kilos = mysqli_real_escape_string($con,$kilos);
$precio = mysqli_real_escape_string($con,$precio);
$flete = mysqli_real_escape_string($con,$flete);
$fecha = mysqli_real_escape_string($con,$fecha);

$sql = "UPDATE alimento SET 
tipo='".$tipo."',
kilos='".$kilos."',
precio='".$precio."',
flete='".$flete."',
fecha='".$fecha."'
WHERE codigo='".$codigo."'
";

$query = mysqli_query($con,$sql);
header('LOCATION: ../../views/v_admin/v_alimentos.php');

}

?>