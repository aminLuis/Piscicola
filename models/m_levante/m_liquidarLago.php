<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$codigo = $_GET['codigo'];
$estado = 'NO ACTIVO';

$estado = mysqli_real_escape_string($con,$estado);
$codigo = mysqli_real_escape_string($con,$codigo);

$sql = "UPDATE salida SET estado='".$estado."' WHERE codigo='".$codigo."'";

$query = mysqli_query($con,$sql);

if(mysqli_error($con)!=null){
    echo  mysqli_error($con);
}else{
    header('LOCATION: ../../views/v_levante/v_saldos.php');
}

?>