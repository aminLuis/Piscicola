<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$codigo = $_GET['codigo'];
$sql = "SELECT *FROM costosFijos WHERE codigo='".$codigo."'";
$query = mysqli_query($con,$sql);
?>