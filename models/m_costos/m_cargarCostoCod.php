<?php
require('../../models/m_usuario/m_sesion.php');
//require('../../config/connect.php');
$sql = "SELECT *FROM costosTotales WHERE lago='".$la."' AND siembra='".$siembra."'";
$query = mysqli_query($con,$s);
?>