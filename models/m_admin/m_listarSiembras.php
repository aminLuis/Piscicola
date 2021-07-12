<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/conexion.php');

$conex = new Conectar();
$con = $conex -> conectar();

$sql = "SELECT *FROM siembra";
$siembras = mysqli_query($con,$sql);
?>