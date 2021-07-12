<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../config/connect.php');
$sql = "DELETE FROM siembra WHERE codigo = '".$codigo."'";
$query = mysqli_query($con,$sql);
header('LOCATION: ../../views/v_admin/v_configuracion.php');
?>