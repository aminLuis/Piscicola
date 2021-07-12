<?php
require('../../models/m_usuario/m_sesion.php');
//require('../../config/connect.php');
$s = "SELECT *FROM costosTotales WHERE lago='".$la."' AND siembra='".$siembra."'";
$qry = mysqli_query($con,$s);
?>