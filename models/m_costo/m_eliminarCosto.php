<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$codigo = $_GET['codigo'];
$sql = "DELETE FROM costosTotales WHERE codigo='".$codigo."'";
$query = mysqli_query($con,$sql);

if(mysqli_error($con)!=null){
  echo mysqli_error($con);
  die();
}
$con -> close();

header('LOCATION: ../../views/v_costos/v_historialCostos.php');
?>