<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$sql = "SELECT *FROM costosTotales";
$query = mysqli_query($con,$sql);

if(mysqli_error($con)){
    echo mysqli_error($con);
}
$con -> close();
?>