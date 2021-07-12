<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$user = $_GET['user'];
$sql = "DELETE FROM usuario WHERE user='".$user."'";
$query = mysqli_query($con,$sql);

if(mysqli_error($con)){
    echo mysqli_error($con);
}else{
    header('LOCATION: ../../views/v_usuario/v_crearUsuario.php');
}

?>