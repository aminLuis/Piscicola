<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$codigo = $_GET['codigo'];
$sql= "DELETE FROM alimento WHERE codigo='".$codigo."'";
$query = mysqli_query($con,$sql);
header('LOCATION: ../../views/v_admin/v_alimentos.php');
?>