<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$codigoInterno = mysqli_real_escape_string($con,$codigoInterno);

$sql = "SELECT *FROM registroSalida WHERE codigoInterno='".$codigoInterno."'";
$query = mysqli_query($con,$sql);


?>