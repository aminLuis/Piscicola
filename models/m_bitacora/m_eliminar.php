<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$codigo = $_GET['codigo'];
$codigo = mysqli_real_escape_string($con,$codigo);
$sql = "DELETE FROM bitacora WHERE codigo='".$codigo."'";
$query = mysqli_query($con,$sql);

if(mysqli_error($con)){
    echo mysqli_error($con);
}else{
header('LOCATION: ../../views/v_bitacora/v_listarBitacoras.php');
}

?>