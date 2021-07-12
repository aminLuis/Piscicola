<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$consult = "SELECT *FROM costosFijos WHERE siembra='".$siembra."'";
$qry = mysqli_query($con,$consult);
foreach($qry as $costos){}
$con ->close();
?>