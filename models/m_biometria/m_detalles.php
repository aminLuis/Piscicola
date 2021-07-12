<?php 
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$sql = "SELECT *FROM muestreo WHERE lago='".$lago."' AND siembra='".$siembra."' ORDER BY fecha";

$query = mysqli_query($con,$sql);



?>