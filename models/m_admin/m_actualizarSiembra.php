<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$codigo = $_GET['codigo'];

$siembra = $_POST['siembra'];
$estado = $_POST['estado'];
$area = $_POST['area'];

if($estado=='NO ACTIVA'){
    $est = 0;
}else{
    $est = 1;
}

$fecha = $_POST['fecha'];

$sql = "UPDATE siembra SET
   siembra='".$siembra."',
   estado='".$est."',
   area='".$area."',
   fecha='".$fecha."'
   WHERE codigo='".$codigo."'";

   $query = mysqli_query($con,$sql);
   header('LOCATION: ../../views/v_admin/v_configuracion.php');

?>