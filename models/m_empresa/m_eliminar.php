<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$nit = $_GET['nit'];
$nit = mysqli_real_escape_string($con,$nit);

$sql = "DELETE FROM empresa WHERE nit='".$nit."'";
$query = mysqli_query($con,$sql);

if(mysqli_error($con)!=null){
    echo mysqli_error($con);
}else{
    header('LOCATION: ../../views/v_admin/v_configuracion.php');
}

$con->close();

?>