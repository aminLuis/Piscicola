<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$lago = mysqli_real_escape_string($con,$lago);
$siembra = mysqli_real_escape_string($con,$siembra);

$sql = "SELECT *FROM consumo WHERE lago='".$lago."' AND siembra='".$siembra."'";
$query = mysqli_query($con,$sql);

?>