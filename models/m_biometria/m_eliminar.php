<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$codigo = $_GET['codigo'];

$sql = "DELETE FROM muestreo WHERE codigo='".$codigo."'";

$query = mysqli_query($con,$sql);

header('LOCATION: ../../views/v_biometria/v_muestreo.php');

?>